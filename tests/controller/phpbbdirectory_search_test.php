<?php
/**
 *
 * phpBB Directory extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014 ErnadoO <http://www.phpbb-services.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace ernadoo\phpbbdirectory\tests\controller;

/**
 * @group controller
 */

class phpbbdirectory_search_test extends controller_base
{
	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixtures/fixture_search.xml');
	}

	/**
	 * Setup test environment
	 */
	public function setUp()
	{
		parent::setUp();

		$this->config = new \phpbb\config\config(array(
			'dir_default_order'	=> 't d',
			'dir_show'			=> 5
		));
	}

	public function get_controller($user_id = 1)
	{
		global $table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch;
		global $phpEx, $phpbb_root_path;

		$this->user->data['user_id']		= $user_id;
		$this->user->data['is_registered']	= ($this->user->data['user_id'] != ANONYMOUS && ($this->user->data['user_type'] == USER_NORMAL || $this->user->data['user_type'] == USER_FOUNDER)) ? true : false;

			$controller = new \ernadoo\phpbbdirectory\controller\search(
				$this->db,
				$this->config,
				$this->lang,
				$this->template,
				$this->user,
				$this->helper,
				$this->request,
				$this->auth,
				$this->pagination,
				$this->core_search,
				$this->core_categorie,
				$this->core_link,
				$phpbb_root_path,
				$phpEx
			);
			$controller->set_tables($table_categories, $tables_comments, $tables_links, $tables_votes, $tables_watch);
			$controller->set_path_helper($this->phpbb_path_helper);
			$controller->set_extension_manager($this->phpbb_extension_manager);

			return $controller;
	}

	/**
	 * Test data for the test_main_error() function
	 *
	 * @return array Array of test data
	 */
	public function main_error_data()
	{
		return array(
			array(1, 403, 'DIR_ERROR_NOT_AUTH'),
		);
	}

	/**
	 * Test controller display
	 *
	 * @dataProvider main_error_data
	 */
	public function test_main_error($user_id, $status_code, $page_content)
	{
		$user_data = $this->auth->obtain_user_data($user_id);
		$this->auth->acl($user_data);

		$controller = $this->get_controller($user_id);

		try
		{
			$response = $controller->main(1);
			$this->fail('The expected \phpbb\exception\http_exception was not thrown');
		}
		catch (\phpbb\exception\http_exception $exception)
		{
			$this->assertEquals($status_code, $exception->getStatusCode());
			$this->assertEquals($page_content, $exception->getMessage());
		}
	}

	/**
	 * Test data for the test_main() function
	 *
	 * @return array Array of test data
	 */
	public function main_data()
	{
		return array(
			array(false, 2, false, false, 200, 'search_body.html'),
			array(false, 3, true, '', 200, 'DIR_ERROR_KEYWORD'),
			array(false, 3, true, 'foo', 200, 'DIR_SEARCH_NO_RESULT'),
			array(false, 3,  true, 'yjuguyu', 200, 'search_results.html'),
			array(1, 3,  true, 'yjuguyu', 200, 'search_results.html'),
			array(2, 2, true, 'yjuguyu', 200, 'DIR_SEARCH_NO_RESULT'),
		);
	}

	/**
	 * Test controller display
	 *
	 * @dataProvider main_data
	 */
	public function test_main($cat_id, $user_id, $search, $keyword, $status_code, $page_content)
	{
		$user_data = $this->auth->obtain_user_data($user_id);
		$this->auth->acl($user_data);

		if ($search)
		{
			$_GET['submit'] = 'Submit';
		}
		if ($keyword)
		{
			$_GET['keywords'] = $keyword;
		}
		if ($cat_id)
		{
			$_GET['cid']	= array($cat_id);
			$_GET['cat_id']	= $cat_id;
		}

		$this->type_cast_helper = $this->getMock('\phpbb\request\type_cast_helper_interface');
		$this->request = new \phpbb\request\request($this->type_cast_helper, false);

		$controller = $this->get_controller($user_id);
		$response = $controller->main(1);

		$this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $response);
		$this->assertEquals($status_code, $response->getStatusCode());
		$this->assertEquals($page_content, $response->getContent());
	}

	protected function tearDown()
	{
		parent::tearDown();
	}
}
