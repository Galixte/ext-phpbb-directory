<?php
/**
*
* info_acp_directory [French]
*
* @package language
* @version $Id: $
* @copyright (c) 2011 http://www.phpbb-services.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_DIRECTORY'							=> 'phpBB Annuaire',
	'ACP_DIRECTORY_CATS'					=> 'Gestion des catégories',
	'ACP_DIRECTORY_INDEX_TITLE'				=> 'phpBB Annuaire',
	'ACP_DIRECTORY_MAIN'					=> 'Informations et outils',
	'ACP_DIRECTORY_SETTINGS'				=> 'Configuration générale',
	'ACP_DIRECTORY_SETTINGS_EXPLAIN'		=> 'Gestion de l’annuaire.',
	'ACP_DIRECTORY_VAL'						=> 'Validation de site',
	'DIR_ACTIVE_CHECK'						=> 'Activer le test des sites soumis',
	'DIR_ACTIVE_CHECK_EXPLAIN'				=> 'En cochant <i>oui</i>, les liens seront testés lors de la soumission, s’ils ne répondent pas en moins d’une seconde, ils seront considérés comme injoignables.',
	'DIR_ACTIVE_THUMB'						=> 'Activer l’affichage des miniatures de site',
	'DIR_ACTIVE_THUMB_REMOTE'				=> 'Activer la compatibilité AscreeN',
	'DIR_ACTIVE_THUMB_REMOTE_EXPLAIN'		=> 'En cochant <i>oui</i>, le mod vérifiera en 1er lieu, lors de la soumission d’un site, si une miniature AscreeN existe sur le serveur distant.<br />Une miniature AscreeN étant gérée par le webmaster, elle correspond théoriquement plus fidèlement à l’aspect du site.',
	'DIR_ACTIV_BANNER'						=> 'Activer le fait de pouvoir lier une bannière',
	'DIR_ACTIV_FLAG'						=> 'Activer le fait de pouvoir choisir une langue',
	'DIR_ACTIV_PAGERANK'					=> 'Activer l’affichage du pagerank des sites',
	'DIR_ACTIV_PAGERANK_EXPLAIN'			=> 'Le pagerank affiché sera celui calculé lors de la soumission du lien.',
	'DIR_ACTIV_REWRITE'						=> 'Activer la réécriture des URLs de l’annuaire',
	'DIR_ACTIV_REWRITE_EXPLAIN'				=> 'En activant cette option, les URLs des catégories de l’annuaire ainsi que le lien annuaire de la navbar seront réécrits en fonction des réglages du mod <a href="http://www.phpbb-seo.com/fr/mod-rewrite-phpbb/ultimate-seo-url-t4489.html" target="_blank">Ultimate SEO URL de dcz</a>.<br />Une mise à jour du fichier .htaccess sera nécéssaire.',
	'DIR_ACTIV_RSS'							=> 'Activer le fait de pouvoir spécifier un flux RSS',
	'DIR_ACTIV_RSS_EXPLAIN'					=> 'En activant cette option, il sera possible de spécifier, lors de l’ajout d’un site, l’url du flux RSS associé.<br />Une icône sera visible lors de la visualisation d’une catégorie.',
	'DIR_ADD_GUEST'							=> 'Paramètres des invités',
	'DIR_ALLOW_BBCODE'						=> 'Autoriser les bbcodes dans les commentaires',
	'DIR_ALLOW_COMMENTS'					=> 'Autoriser les commentaires',
	'DIR_ALLOW_LINKS'						=> 'Autoriser les liens dans les commentaires',
	'DIR_ALLOW_SMILIES'						=> 'Autoriser les smileys dans les commentaires',
	'DIR_ALLOW_VOTES'						=> 'Autoriser les votes',
	'DIR_ANNOUNCEMENT_TOPIC'				=> 'Annonce de la nouvelle version',
	'DIR_BANNERS_DIR_SIZE'					=> 'Taille du répertoire de stockage des bannières',
	'DIR_BANN_PARAM'						=> 'Paramètres des bannières',
	'DIR_CAT_ADMIN'							=> 'Administration des catégories de l’annuaire',
	'DIR_CAT_ADMIN_EXPLAIN'					=> 'Ici vous pouvez individuellement ajouter, modifier, supprimer des catégories. Si les statistiques des liens (commentaires, nombre de votes) ainsi que celles des catégories semblent erronées, vous pouvez également re-synchroniser une catégorie.',
	'DIR_CAT_CREATED'						=> 'La catégorie a été créée.',
	'DIR_CAT_DATA_NEGATIVE'					=> 'Les paramètres de vérification automatique ainsi que le nombre de vérifications avant suppression ne peuvent être négatifs ou nuls.',
	'DIR_CAT_DELETE'						=> 'Supprimer la catégorie',
	'DIR_CAT_DELETED'						=> 'La catégorie a été supprimée',
	'DIR_CAT_DELETE_EXPLAIN'				=> 'Le formulaire suivant vous permet de supprimer une catégorie et de décider où vous désirez déplacer tous les liens (ou catégorie) qu’elle contient.',
	'DIR_CAT_DESC'							=> 'Description',
	'DIR_CAT_DESC_EXPLAIN'					=> 'La description de votre catégorie est facultative. Si vous en écrivez une, elle apparaîtra au dessus des sites de cette catégorie.<br />Toute balise HTML saisie sera affichée telle quelle.',
	'DIR_CAT_GENERAL_SETTINGS'				=> 'Paramètres généraux de la catégorie',
	'DIR_CAT_ICON'							=> 'Image de la catégorie',
	'DIR_CAT_NAME'							=> 'Nom de la catégorie',
	'DIR_CAT_NAME_EMPTY'					=> 'Vous devez indiquer un nom pour la catégorie.',
	'DIR_CAT_PARENT'						=> 'Catégorie parente',
	'DIR_CAT_RESYNCED'						=> 'La catégorie « %s » a été resynchronisée',
	'DIR_CAT_SETTINGS'						=> 'Réglages de la catégorie',
	'DIR_CAT_TOO_LONG'						=> 'La description de la catégorie est trop longue. Elle ne peut contenir plus de 4000 caractères.',
	'DIR_CAT_UPDATED'						=> 'Les informations de la catégorie ont été mises à jour.',
	'DIR_COMM_PARAM'						=> 'Paramètres des commentaires',
	'DIR_COMM_PER_PAGE'						=> 'Nombre de commentaires par page',
	'DIR_CONFIG_SETTINGS'					=> 'Mise à jour de la configuration de l’annuaire',
	'DIR_COUNT_ALL'							=> 'Prendre en compte les sites des sous-catégories',
	'DIR_COUNT_ALL_EXPLAIN'					=> 'En activant cette option, le compteur affiché à coté de chaque catégorie tiendra compte du nombre de sites présents dans les sous-catégories.',
	'DIR_CREATE_CAT'						=> 'Créer une nouvelle catégorie',
	'DIR_CRON_ENABLE'						=> 'Activer la vérification périodique des liens retours',
	'DIR_CRON_ENABLE_EXPLAIN'				=> 'Si activée, cette option va vérifier de façon périodoque, la validité des liens retours spécifiés lors des soumissions des liens de cette catégorie.',
	'DIR_CRON_EVERY'						=> 'Vérifier tous les',
	'DIR_CRON_SETTINGS'						=> 'Paramètre des liens réciproques',
	'DIR_DEFAULT_ORDER'						=> 'Ordre par défaut de classement des sites',
	'DIR_DELETE_ALL_LINKS'					=> 'Supprimer tous les liens',
	'DIR_DELETE_ORPHANS'					=> 'Supprimer les bannières orphelines',
	'DIR_DELETE_ORPHANS_CONFIRM'			=> 'Êtes-vous sûr de vouloir supprimer les bannières orphelines ?',
	'DIR_DELETE_ORPHANS_EXPLAIN'			=> 'Les bannières orphelines sont les bannières qui ont été copiées sur le serveur mais qui, pour une raison inconnue, ne sont plus associées à un site de l’annuaire.',
	'DIR_DELETE_ORPHANS_EXPLAIN'			=> 'Bannières orphelines supprimées',
	'DIR_DELETE_SUBCATS'					=> 'Supprimer les sous-catégories et liens',
	'DIR_DOWNLOAD_LATEST'					=> 'Télécharger la dernière version',
	'DIR_EDIT_CAT'							=> 'Modifier une catégorie',
	'DIR_EDIT_EXPLAIN'						=> 'Le formulaire suivant vous permet de personnaliser cette catégorie.',
	'DIR_ERROR_AUTH_COMM'					=> 'Vous n’êtes pas autorisés à poster des commentaires',
	'DIR_ERROR_CAT'							=> 'Impossible de récupérer les données de la catégorie actuelle',
	'DIR_ERROR_COMM_LOGGED'					=> 'Vous devez être connecté pour pouvoir poster un commentaire',
	'DIR_ERROR_KEYWORD'						=> 'Vous devez entrer des mots clés pour faire une recherche.',
	'DIR_ERROR_NOT_AUTH'					=> 'Vous n’avez pas l’autorisation requise pour cette opération',
	'DIR_ERROR_NO_LINK'						=> 'Le site recherché n’existe pas',
	'DIR_ERROR_NO_LINKS'					=> 'Ce site n’existe pas',
	'DIR_ERROR_SUBMIT_TYPE'					=> 'Type de données incorects dans la fonction dir_submit_type',
	'DIR_ERROR_URL'							=> 'Vous devez entrer une URL valide.',
	'DIR_ERROR_VOTE'						=> 'Vous avez déjà voté pour ce site',
	'DIR_ERROR_VOTE_LOGGED'					=> 'Vous devez être connecté pour pouvoir voter',
	'DIR_INDEX'								=> 'Index de l’annuaire',
	'DIR_LENGTH_COMMENTS'					=> 'Nombre de caractères maximun pour un commentaire de lien',
	'DIR_LINKS'								=> 'Liens',
	'DIR_LINK_ACTIVATE'						=> 'Valider',
	'DIR_LINK_DELETE'						=> 'Supprimer',
	'DIR_LIST_INDEX'						=> 'Afficher la catégorie dans la légende de sa catégorie parente',
	'DIR_MAIL_NOTIFICATION'					=> 'Un nouveau site dans l’annuaire',
	'DIR_MAIL_VALIDATION'					=> 'Recevoir un e-mail en cas de demande de validation',
	'DIR_MAX_ADD_ATTEMPTS'					=> 'Tentatives de soumission d’un lien',
	'DIR_MAX_ADD_ATTEMPTS_EXPLAIN'			=> 'Nombre de tentatives que les utilisateurs pourront faire dans la saisie du code de confirmation avant que leur session n’expire.',
	'DIR_MAX_BANN'							=> 'Dimensions maximales des bannières',
	'DIR_MAX_BANN_EXPLAIN'					=> 'Taille maximale des bannières jointes. Réglez les deux valeurs sur 0px par 0px pour désactiver le contrôle des dimensions.',
	'DIR_MAX_DESC'							=> 'Nombre de caractères maximun pour la description des liens',
	'DIR_MAX_SIZE'							=> 'Taille maximale d’une bannière',
	'DIR_MAX_SIZE_EXPLAIN'					=> 'Pour les bannières envoyées.',
	'DIR_MOVE_LINKS_TO'						=> 'Déplacer les liens vers',
	'DIR_MOVE_SUBCATS_TO'					=> 'Déplacer les sous-catégories',
	'DIR_MUST_BACK'							=> 'Exiger un lien retour',
	'DIR_MUST_BACK_EXPLAIN'					=> 'Si activée, cette option oblige à fournir un lien retour lors de la soumission d’un site.',
	'DIR_MUST_DESCRIBE'						=> 'Rendre obligatoire la description du site lors de la soumission',
	'DIR_NB_CHECK'							=> 'Nombre de vérifications avant suppression',
	'DIR_NB_CHECK_EXPLAIN'					=> 'Indiquez ici le nombre de vérifications avant la suppression d’un lien dont le lien retour n’est plus valable. Un e-mail sera envoyé à chaque échec afin de prévenir le posteur de l’inaccessibilité ou la non présence de son lien retour. Mettre 0 pour une suppression dès le 1er échec.',
	'DIR_NEW_TIME'							=> 'Nombre de jours pour les nouveaux liens',
	'DIR_NEW_TIME_EXPLAIN'					=> 'Nombre de jours durant lesquels un lien est considéré comme nouveau. Si un lien est considéré comme tel, une petite icône « nouveau » sera affichée. Mettre 0 pour désactiver cette fonction.',
	'DIR_NEXT_CRON_ACTION'					=> 'Date de la prochaine vérification planifiée',
	'DIR_NO_CAT'							=> 'Aucune catégorie séléctionnée',
	'DIR_NO_DESTINATION_CAT'				=> 'Aucune catégorie de destination n’a été spécifiée',
	'DIR_NO_LINK'							=> 'Il n’y a aucun site en attente de validation',
	'DIR_NO_PARENT'							=> 'Aucune',
	'DIR_NUMBER_CATS'						=> 'Nombre de catégories',
	'DIR_NUMBER_CLICKS'						=> 'Nombre de clics',
	'DIR_NUMBER_COMMENTS'					=> 'Nombre de commentaires',
	'DIR_NUMBER_LINKS'						=> 'Nombre de liens actifs',
	'DIR_NUMBER_ORPHANS'					=> 'Nombre de bannières orphelines',
	'DIR_NUMBER_VOTES'						=> 'Nombre de votes',
	'DIR_ORDER_A_A'							=> '[Croissant] Posteur',
	'DIR_ORDER_A_D'							=> '[Décroissant] Posteur',
	'DIR_ORDER_R_A'							=> '[Croissant] Commentaires',
	'DIR_ORDER_R_D'							=> '[Décroissant] Commentaires',
	'DIR_ORDER_S_A'							=> '[Croissant] Nom',
	'DIR_ORDER_S_D'							=> '[Décroissant] Nom',
	'DIR_ORDER_T_A'							=> '[Croissant] Date',
	'DIR_ORDER_T_D'							=> '[Décroissant] Date',
	'DIR_ORDER_V_A'							=> '[Croissant] Clics',
	'DIR_ORDER_V_D'							=> '[Décroissant] Clics',
	'DIR_PARAM'								=> 'Paramètres généraux',
	'DIR_RECENT_COLUMNS'					=> 'Nombre de colonnes par ligne dans le bloc',
	'DIR_RECENT_ENABLE'						=> 'Activer le bloc des derniers liens ajoutés',
	'DIR_RECENT_ENABLE_EXPLAIN'				=> 'En activant cette option, un bloc contenant les derniers sites ajoutés à l’annuaire, sera affiché en bas de la page principale de l’annuaire.<br />Le nombre de sites à afficher dépend des réglages ci-dessous.',
	'DIR_RECENT_EXCLUDE'					=> 'ID des catégories à exclure',
	'DIR_RECENT_EXCLUDE_EXPLAIN'			=> 'Entrez ici les IDs des catégories à ne pas prendre en compte, séparés par une virgule.<br />Exemple : 1,4,12',
	'DIR_RECENT_GUEST'						=> 'Paramètres du bloc « Derniers liens ajoutés »',
	'DIR_RECENT_ROWS'						=> 'Nombre de lignes dans le bloc',
	'DIR_RELEASE_ANNOUNCEMENT'				=> 'Annonce',
	'DIR_RESET_CLICKS'						=> 'Réinitialiser les compteurs de clics',
	'DIR_RESET_CLICKS_CONFIRM'				=> 'Êtes-vous sûr de vouloir réinitialiser les compteurs de clics ?',
	'DIR_RESET_CLICKS_SUCCESS'				=> 'Compteurs de clics réinitialisés.',
	'DIR_RESET_COMMENTS'					=> 'Réinitialiser les commentaires',
	'DIR_RESET_COMMENTS_CONFIRM'			=> 'Êtes-vous sûr de vouloir réinitialiser les commentaires ?',
	'DIR_RESET_COMMENTS_EXPLAIN'			=> 'Supprime tous les commentaires des liens de l’annuaire.',
	'DIR_RESET_COMMENTS_SUCCESS'			=> 'Commentaires supprimés.',
	'DIR_RESET_VOTES'						=> 'Réinitialiser les votes',
	'DIR_RESET_VOTES_CONFIRM'				=> 'Êtes-vous sûr de vouloir réinitialiser les votes ?',
	'DIR_RESET_VOTES_EXPLAIN'				=> 'Supprime tous les votes des liens de l’annuaire.',
	'DIR_RESET_VOTES_SUCCESS'				=> 'Votes supprimés.',
	'DIR_REWRITE_PARAM'						=> 'Paramètres de la réécriture d’URL',
	'DIR_SELECT_CAT'						=> 'Sélectionner une catégorie',
	'DIR_SHOW'								=> 'Nombre de sites par page',
	'DIR_STATS'								=> 'Statistiques de l’annuaire',
	'DIR_STORAGE_BANNER'					=> 'Copier les bannières sur le serveur',
	'DIR_STORAGE_BANNER_EXPLAIN'			=> 'En activant cette option, les bannières liées aux sites seront copiées vers ce serveur.<br />Activer cette option accélère considérablement le chargement des pages des catégories.',
	'DIR_SUBCAT'							=> 'Sous-catégorie',
	'DIR_THUMB_PARAM'						=> 'Paramètres des miniatures',
	'DIR_THUMB_SERVICE'						=> 'Service de miniature à utiliser',
	'DIR_THUMB_SERVICE_EXPLAIN'				=> 'Service de miniature à utiliser lorsque la miniature AscreeN n’existe pas. A moins d’activer l’option ci-dessous, changer ce réglage n’affectera que les futurs sites validés.',
	'DIR_THUMB_SERVICE_REVERSE'				=> 'Rendre le changement de service rétroactif',
	'DIR_THUMB_SERVICE_REVERSE_EXPLAIN'		=> 'En cochant <i>oui</i>, les liens déjà existants avant le changement de service utiliseront le nouveau service séléctionné. Cela nécéssite une requête par site lors du 1er affichage après le changement de service, afin de mettre à jour la table.',
	'DIR_USER_PROP'							=> 'Proposé par %s dans <i>%s</i> le %s',
	'DIR_VALIDATE'							=> 'Activer la validation par un administrateur',
	'DIR_VALIDATE_EXPLAIN'					=> 'En cochant <i>oui</i>, les liens proposés devront être validés avant d’apparaître dans l’annuaire, autrement si vous cochez <i>non</i> les liens seront directement affichés sans vérification.',
	'DIR_VALIDATION'						=> 'Validation des sites de l’annuaire',
	'DIR_VALIDATION_EXPLAIN'				=> 'Cette option sera valable uniquement si vous avez décidé depuis le panneau de Gestion des catégories que les sites de l’annuaire doivent d’abord être validés.<br />Si c’est le cas un e-mail sera envoyé à la personne ayant proposé le site, dès que vous aurez validé le site depuis ce panneau celui ci apparaîtra dans l’annuaire.<br />NB : Chaque catégorie est paramétrable individuellement.',
	'DIR_VERSION_NOT_UP_TO_DATE_ACP'		=> 'Votre version de phpBB Annuaire n’est pas à jour.<br />Vous trouverez ci-dessous un lien vers l’annonce de sortie de la dernière version et les instructions pour effectuer cette mise à jour.',
	'DIR_VERSION_UP_TO_DATE_ACP'			=> 'Votre version de phpBB Annuaire est à jour, aucune mise à jour n’est disponible. Vous n’avez pas besoin de mettre à jour votre installation.',
	'DIR_VISUAL_CONFIRM'					=> 'Activer la confirmation visuelle pour les invités',
	'DIR_VISUAL_CONFIRM_EXPLAIN'			=> 'En cochant <i>oui</i>, les invités devront saisir un code aléatoire correspondant à une image afin d’empêcher les soumissions en masse.',
	'DIR_WAITING_LINKS'						=> 'Nombre de liens en attente de validation',

	'IMG_BUTTON_LINK_NEW'					=> 'Ajouter un nouveau site',
	'IMG_ICON_LINK_NEW'						=> 'Nouveau site',

	'LOG_DIR_AUTO_PRUNE'					=> '<strong>Auto-délestage d’une catégorie de l’annuaire</strong><br />» %s',
	'LOG_DIR_CAT_ADD'						=> '<strong>Création d’une nouvelle catégorie dans l’annuaire</strong><br />» %s',
	'LOG_DIR_CAT_DEL_CAT'					=> '<strong>Suppression d’une catégorie</strong><br />» %s',
	'LOG_DIR_CAT_DEL_CATS'					=> '<strong>Suppression d’une catégorie et de ses sous-catégories</strong><br />» %s',
	'LOG_DIR_CAT_DEL_LINKS'					=> '<strong>Suppression d’une catégorie et de ses messages</strong><br />» %s',
	'LOG_DIR_CAT_DEL_LINKS_CATS'			=> '<strong>Suppression d’une catégorie, de ses messages et de ses sous-catégories</strong><br />» %s',
	'LOG_DIR_CAT_DEL_LINKS_MOVE_CATS'		=> '<strong>Suppression d’une catégorie et de ses messages, sous-catégories déplacées</strong> vers %1$s<br />» %2$s',
	'LOG_DIR_CAT_DEL_MOVE_CATS'				=> '<strong>Suppression d’une catégorie et sous-catégories déplacées</strong> vers %1$s<br />» %2$s',
	'LOG_DIR_CAT_DEL_MOVE_LINKS'			=> '<strong>Suppression d’une catégorie et messages déplacés</strong> vers %1$s<br />» %2$s',
	'LOG_DIR_CAT_DEL_MOVE_LINKS_CATS'		=> '<strong>Suppression d’une catégorie et ses sous-catégories, messages déplacés</strong> vers %1$s<br />» %2$s',
	'LOG_DIR_CAT_DEL_MOVE_LINKS_MOVE_CATS'	=> '<strong>Suppression d’une catégorie, déplacement des messages</strong> vers %1$s <strong>et de ses sous-catégories</strong> vers %2$s<br />» %3$s',
	'LOG_DIR_CAT_EDIT'						=> '<strong>Modification d’une catégorie de l’annuaire</strong><br />» %s',
	'LOG_DIR_CAT_MOVE_DOWN'					=> '<strong>Déplacement de la catégorie de l’annuaire</strong> %1$s <strong>en dessous de</strong> %2$s',
	'LOG_DIR_CAT_MOVE_UP'					=> '<strong>Déplacement de la catégorie de l’annuaire</strong> %1$s <strong>au dessus de</strong> %2$s',
	'LOG_DIR_CAT_SYNC'						=> '<strong>Resynchronisation d’une catégorie de l’annuaire</strong><br />» %s',
	'LOG_LINK_ACTIVE'						=> 'Activation de liens en attente d’approbation :<br />» %s',
	'LOG_LINK_DELETE'						=> 'Suppression de liens en attente d’approbation :<br />» %s',

	'SYNC_IN_PROGRESS'						=> 'Synchronisation de la catégorie',
	'SYNC_IN_PROGRESS_EXPLAIN'				=> 'Resynchronisation des liens %1$d/%2$d en cours.',

	'TOO_LONG_DESCRIPTION'					=> 'Votre description est trop longue',
	'TOO_SHORT_DESCRIPTION'					=> 'Vous devez entrer une description',
	'TOO_SHORT_REPLY'						=> 'Votre commentaire est trop court',
	'TOO_SHORT_SITE_NAME'					=> 'Vous devez indiquer un nom pour le site',
	'TOO_SHORT_URL'							=> 'Vous devez indiquer une URL',
	'TOO_SMALL_CAT'							=> 'Vous devez choisir une catégorie',
));
