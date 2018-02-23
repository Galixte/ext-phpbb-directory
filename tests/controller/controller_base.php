<?php
/**
*
* phpBB Directory extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 ErnadoO <http://www.phpbb-services.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace ernadoo\phpbbdirectory\tests\controller
{
	abstract class controller_base extends \phpbb_database_test_case
	{
		/** @var \PHPUnit_Framework_MockObject_MockObject|\phpbb\auth\auth */
		protected $auth;

		/** @var \phpbb\config\config */
		protected $config;

		/** @var \PHPUnit_Framework_MockObject_MockObject|\Symfony\Component\DependencyInjection\ContainerInterface */
		protected $container;

		/** @var \PHPUnit_Framework_MockObject_MockObject|\phpbb\controller\helper */
		protected $helper;

		/** @var \phpbb\language\language */
		protected $lang;

		/** @var \PHPUnit_Framework_MockObject_MockObject|\phpbb\template\template */
		protected $template;

		/** @var \phpbb\user */
		protected $user;

		/**
		* Define the extensions to be tested
		*
		* @return array vendor/name of extension(s) to test
		*/
		static protected function setup_extensions()
		{
			return array('ernadoo/phpbbdirectory');
		}

		public function setUp()
		{
			global $cache, $phpbb_container, $phpbb_extension_manager, $user, $phpbb_root_path, $phpEx;
			global $auth, $config, $phpbb_filesystem, $template, $db, $phpbb_path_helper, $phpbb_dispatcher;
			global $table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch;

			parent::setUp();

			$table_categories	= 'phpbb_directory_cats';
			$tables_comments	= 'phpbb_directory_comments';
			$tables_links		= 'phpbb_directory_links';
			$tables_votes		= 'phpbb_directory_votes';
			$tables_watch		= 'phpbb_directory_watch';

			//Let's build some deps
			$this->auth			= new \phpbb\auth\auth;

			$this->cache		= new \phpbb_mock_cache();
			$this->cache->purge();

			$this->config		= new \phpbb\config\config(array());

			$this->db			= $this->new_dbal();

			$this->filesystem	= new \phpbb\filesystem\filesystem();

			$this->phpbb_path_helper = new \phpbb\path_helper(
				new \phpbb\symfony_request(new \phpbb_mock_request()),
				$this->filesystem,
				new \phpbb_mock_request(),
				$phpbb_root_path,
				$phpEx
			);

			$this->lang = new \phpbb\language\language(
				new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx)
			);

			$this->user = new \phpbb\user($this->lang, '\phpbb\datetime');

			$this->user->timezone = new \DateTimeZone('UTC');
			$this->user->lang = array(
				'datetime' => array(),
				'DATE_FORMAT' => 'm/d/Y',
			);

			$this->request = $this->getMock('\phpbb\request\request');

			$this->template = $this->getMockBuilder('\phpbb\template\template')->getMock();

			$this->dispatcher = new \phpbb\event\dispatcher(new \phpbb_mock_container_builder());

			$this->helper = $this->getMockBuilder('\phpbb\controller\helper')
				->disableOriginalConstructor()
				->getMock();

			$this->helper->expects($this->any())
				->method('render')
				->willReturnCallback(function ($template_file, $page_title = '', $status_code = 200, $display_online_list = false) {
					return new \Symfony\Component\HttpFoundation\Response($template_file, $status_code);
			});

			$this->helper->expects($this->any())
				->method('message')
				->willReturnCallback(function ($message, array $parameters = array(), $title = 'INFORMATION', $code = 200) {
					return new \Symfony\Component\HttpFoundation\Response($message, $code);
			});

			$this->helper
				->method('route')
				->will($this->returnArgument(0));

			$this->pagination = new \phpbb\pagination($this->template, $this->user, $this->helper, $this->dispatcher);

			$this->user_loader = $this->getMockBuilder('\phpbb\user_loader')
				->disableOriginalConstructor()
			->getMock();

			$this->notification_helper = $this->getMockBuilder('\phpbb\notification\manager')
				->disableOriginalConstructor()
			->getMock();

			$this->phpbb_extension_manager = new \phpbb_mock_extension_manager($phpbb_root_path);

			$phpbb_container = new \phpbb_mock_container_builder();
			$phpbb_container = $this->get_test_case_helpers()->set_s9e_services($phpbb_container);
			$phpbb_container->set('config', $config);
			$phpbb_container->set('controller.helper', $this->helper);
			$phpbb_container->set('filesystem', $this->filesystem);
			$phpbb_container->set('path_helper', $this->phpbb_path_helper);
			$phpbb_container->set('ext.manager', $this->phpbb_extension_manager);
			$phpbb_container->set('pagination', $this->pagination);
			$phpbb_container->set('user', $this->user);
			$phpbb_container->setParameter('core.cache_dir', $phpbb_root_path . 'cache/' . PHPBB_ENVIRONMENT . '/');
			$phpbb_container->setParameter('tables.dir.categories', $table_categories);

			$context = new \phpbb\template\context();
			$twig_extension = new \phpbb\template\twig\extension($context, $this->lang);
			$phpbb_container->set('template.twig.extensions.phpbb', $twig_extension);

			$twig_extensions_collection = new \phpbb\di\service_collection($phpbb_container);
			$twig_extensions_collection->add('template.twig.extensions.phpbb');
			$phpbb_container->set('template.twig.extensions.collection', $twig_extensions_collection);

			$phpbb_container->set('ernadoo.phpbbdirectory.core.nestedset_category',
				new \ernadoo\phpbbdirectory\core\nestedset_category(
					$this->db,
					new \phpbb\lock\db(
						'ernadoo.phpbbdirectory.table_lock.directory_cats',
						$this->config,
						$this->db
					),
					$table_categories
				)
			);

			$plugins = new \phpbb\di\service_collection($phpbb_container);
			$plugins->add('core.captcha.plugins.nogd');
			$this->captcha_factory = new \phpbb\captcha\factory($phpbb_container,$plugins);

			$phpbb_container->set('core.captcha.plugins.nogd', new \phpbb\captcha\plugins\nogd);

			$imagesize = new \FastImageSize\FastImageSize;

			$phpbb_container->set('files.filespec', new \phpbb\files\filespec($this->filesystem, $this->lang, new \bantu\IniGetWrapper\IniGetWrapper, new \FastImageSize\FastImageSize(), $phpbb_root_path));

			$factory = new \phpbb\files\factory($phpbb_container);

			$phpbb_container->set('files.types.remote', new \phpbb\files\types\remote($this->config, $factory, $this->lang, new \bantu\IniGetWrapper\IniGetWrapper, $this->request, $phpbb_root_path));

			$factory = new \phpbb\files\factory($phpbb_container);

			$upload = new \phpbb\files\upload($this->filesystem, $factory, $this->lang, new \bantu\IniGetWrapper\IniGetWrapper, $this->request, $phpbb_root_path);

			$phpbb_log = new \phpbb\log\log($this->db, $this->user, $this->auth, $this->dispatcher, $phpbb_root_path, 'adm/', $phpEx, LOG_TABLE);

			$this->core_link = new \ernadoo\phpbbdirectory\core\link(
				$this->db,
				$this->config,
				$this->lang,
				$this->template,
				$this->user,
				$this->helper,
				$this->request,
				$this->auth,
				$this->notification_helper,
				$this->filesystem,
				$imagesize,
				$upload,
				$phpbb_root_path,
				$phpEx
			);
			$this->core_link->set_tables($table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch);
			$this->core_link->set_path_helper($this->phpbb_path_helper);
			$this->core_link->set_extension_manager($this->phpbb_extension_manager);

			$this->core_cron = new \ernadoo\phpbbdirectory\core\cron(
				$this->db,
				$this->config,
				$phpbb_log,
				$this->user,
				$this->notification_helper,
				$this->core_link,
				$phpbb_root_path,
				$phpEx
			);
			$this->core_cron->set_tables($table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch);
			$this->core_cron->set_path_helper($this->phpbb_path_helper);
			$this->core_cron->set_extension_manager($this->phpbb_extension_manager);

			$cron_task = new \ernadoo\phpbbdirectory\cron\task\core\prune_categorie(
				$this->config,
				$this->core_cron,
				$phpEx
			);
			$cron_task->set_name('ernadoo.phpbbdirectory.cron.task.core.prune_categorie');

			$this->cron = $this->create_cron_manager(array($cron_task));
			$phpbb_container->set('cron.manager', $this->cron);

			$this->core_categorie = new \ernadoo\phpbbdirectory\core\categorie(
				$this->db,
				$this->config,
				$this->lang,
				$this->template,
				$this->user,
				$this->helper,
				$this->request,
				$this->auth,
				$this->cron
			);
			$this->core_categorie->set_tables($table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch);
			$this->core_categorie->set_path_helper($this->phpbb_path_helper);
			$this->core_categorie->set_extension_manager($this->phpbb_extension_manager);

			$this->core_comment = new \ernadoo\phpbbdirectory\core\comment(
				$this->db,
			    $this->lang
			);
			$this->core_comment->set_tables($table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch);
			$this->core_comment->set_path_helper($this->phpbb_path_helper);
			$this->core_comment->set_extension_manager($this->phpbb_extension_manager);

			$this->core_search = new \ernadoo\phpbbdirectory\search\fulltext_directory(
				$this->db
			);
			$this->core_search->set_tables($table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch);
			$this->core_search->set_path_helper($this->phpbb_path_helper);
			$this->core_search->set_extension_manager($this->phpbb_extension_manager);

			// Global vars
			$auth						= $this->auth;
			$cache						= $this->cache;
			$config						= $this->config;
			$db							= $this->db;
			$phpbb_dispatcher			= $this->dispatcher;
			$phpbb_extension_manager	= $this->phpbb_extension_manager;
			$phpbb_filesystem			= $this->filesystem;
			$phpbb_path_helper			= $this->phpbb_path_helper;
			$request					= $this->request;
			$template					= $this->template;
			$user						= $this->user;
		}

		protected function mock_request()
		{
			$this->request->expects($this->any())
			->method('is_set_post')
			->willReturnCallback(function ($name) {
				return true;
			});
		}

		private function create_cron_manager($tasks)
		{
			global $phpbb_root_path, $phpEx;

			return new \phpbb\cron\manager($tasks, $phpbb_root_path, $phpEx);
		}
	}
}
namespace ernadoo\phpbbdirectory\controller
{
	function confirm_box($check, $title = '', $hidden = '', $html_body = 'confirm_body.html', $u_action = '')
	{
		if (!$check)
		{
			return new \Symfony\Component\HttpFoundation\Response($html_body);
		}
		return $check;
	}

	function check_form_key($name)
	{
		return true;
	}
}

namespace ernadoo\phpbbdirectory\core
{
	function redirect($url, $return = false, $disable_cd_check = false)
	{
		return new \Symfony\Component\HttpFoundation\Response($url, 302);
	}
}
