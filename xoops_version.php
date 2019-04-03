<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * tdmcreate module.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.5.7
 *
 * @author          Txmod Xoops http://www.txmodxoops.org
 *
 * @version         $Id: xoops_version.php 11084 2014-02-07 11:20:25Z timgno $
 */
if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}
$moduleDirName = basename(__DIR__);

$modversion['version'] = 1.91;
$modversion['module_status'] = 'Alpha 3.7';
$modversion['release_date'] = '2018/07/07';
$modversion['name'] = _MI_TDMCREATE_NAME;
$modversion['description'] = _MI_TDMCREATE_DESC;
$modversion['author'] = 'Xoops TDM';
$modversion['author_website_url'] = 'https://xoops.org/';
$modversion['author_website_name'] = 'Xoops Team Developers Module';
$modversion['credits'] = 'Mamba(Xoops), Timgno(Txmod Xoops), Goffy(German Xoops)';
$modversion['help'] = 'page=help';
$modversion['license'] = 'GNU GPL 2.0 or later';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['release_info'] = 'README';
$modversion['release_file'] = 'https://github.com/txmodxoops/tdmcreate-1.91/releases';
$modversion['manual'] = 'MANUAL';
$modversion['manual_file'] = XOOPS_URL . "/modules/{$moduleDirName}/docs/manual.txt";
$modversion['image'] = "assets/images/{$moduleDirName}_logo.png";
$modversion['dirname'] = "{$moduleDirName}";
// Frameworks icons
$modversion['dirmoduleadmin'] = '/Frameworks/moduleclasses/moduleadmin';
$modversion['sysicons16'] = '../../Frameworks/moduleclasses/icons/16';
$modversion['sysicons32'] = '../../Frameworks/moduleclasses/icons/32';
// Module icons
$modversion['modicons16'] = 'assets/icons/16';
$modversion['modicons32'] = 'assets/icons/32';
$modversion['targetdir'] = XOOPS_UPLOAD_PATH . "/{$moduleDirName}/repository/";
$modversion['module_website_url'] = 'https://github.com/txmodxoops/tdmcreate-1.91';
$modversion['module_website_name'] = 'GitHub Txmodx Xoops';
$modversion['min_php'] = '5.5';
$modversion['min_xoops'] = '2.5.9';
$modversion['min_admin'] = '1.2';
$modversion['min_db'] = ['mysql' => '5.5'];
//about
$modversion['demo_site_url'] = 'https://xoops.org/';
$modversion['demo_site_name'] = 'Xoops TDM';
$modversion['forum_site_url'] = 'https://xoops.org/modules/newbb/viewtopic.php?post_id=358118';
$modversion['forum_site_name'] = 'TDMCreate 1.91 alpha for Testing';
$modversion['module_website_name'] = 'Xoops TDM';
// Admin things
$modversion['system_menu'] = 1;
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';
// Templates admin
$modversion['templates'][] = ['file' => 'tdmcreate_about.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_building.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_fields.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_fields_item.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_footer.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_header.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_index.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_modules.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_tables.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_tables_item.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_settings.tpl', 'description' => '', 'type' => 'admin'];
$modversion['templates'][] = ['file' => 'tdmcreate_morefiles.tpl', 'description' => '', 'type' => 'admin'];

// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables created by sql file (without prefix!)
$modversion['tables'] = [
    $moduleDirName . '_' . 'settings',
    $moduleDirName . '_' . 'modules',
    $moduleDirName . '_' . 'tables',
    $moduleDirName . '_' . 'fields',
    $moduleDirName . '_' . 'languages',
    $moduleDirName . '_' . 'fieldtype',
    $moduleDirName . '_' . 'fieldattributes',
    $moduleDirName . '_' . 'fieldnull',
    $moduleDirName . '_' . 'fieldkey',
    $moduleDirName . '_' . 'fieldelements',
    $moduleDirName . '_' . 'morefiles',
];
// Scripts to run upon installation or update
$modversion['onInstall'] = 'include/install.php';
$modversion['onUpdate'] = 'include/update.php';
// Menu
$modversion['hasMain'] = 0;
// Config
$c = 1;
$modversion['config'][$c]['name'] = 'break' . $c;
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_BREAK_GENERAL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'line_break';
$modversion['config'][$c]['valuetype'] = 'textbox';
$modversion['config'][$c]['default'] = 'head';
++$c;
$modversion['config'][$c]['name'] = 'tdmcreate_editor';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_EDITOR';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_EDITOR_DESC';
$modversion['config'][$c]['formtype'] = 'select';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'dhtml';
xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][$c]['options'] = array_flip($editorHandler->getList());
++$c;
//Uploads : mimetypes
$modversion['config'][$c]['name'] = 'mimetypes';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MIMETYPES';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_MIMETYPES_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'gif|jpeg|pjpeg|png';
++$c;
//Uploads : maxsize
$modversion['config'][$c]['name'] = 'maxsize';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MAXSIZE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_MAXSIZE_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = '5000000';
++$c;
$modversion['config'][$c]['name'] = 'settings_adminpager';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_SETTINGS_ADMINPAGER';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_SETTINGS_ADMINPAGER_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 10;
++$c;
$modversion['config'][$c]['name'] = 'modules_adminpager';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MODULES_ADMINPAGER';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_MODULES_ADMINPAGER_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 10;
++$c;
$modversion['config'][$c]['name'] = 'tables_adminpager';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_TABLES_ADMINPAGER';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_TABLES_ADMINPAGER_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 10;
++$c;
$modversion['config'][$c]['name'] = 'fields_adminpager';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_FIELDS_ADMINPAGER';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_FIELDS_ADMINPAGER_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 10;
++$c;
$modversion['config'][$c]['name'] = 'morefiles_adminpager';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MOREFILES_ADMINPAGER';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_MOREFILES_ADMINPAGER_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 10;
++$c;
$modversion['config'][$c]['name'] = 'break' . $c;
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_BREAK_REQUIRED';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'line_break';
$modversion['config'][$c]['valuetype'] = 'textbox';
$modversion['config'][$c]['default'] = 'head';
++$c;
$modversion['config'][$c]['name'] = 'name';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_NAME';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'My Module';
++$c;
$modversion['config'][$c]['name'] = 'dirname';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_DIRNAME';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'mymoduledirname';
++$c;
$modversion['config'][$c]['name'] = 'version';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_VERSION';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '1.0';
++$c;
$modversion['config'][$c]['name'] = 'since';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_SINCE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '1.0';
++$c;
$modversion['config'][$c]['name'] = 'min_php';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MIN_PHP';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '5.5';
++$c;
$modversion['config'][$c]['name'] = 'min_xoops';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MIN_XOOPS';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '2.5.9';
++$c;
$modversion['config'][$c]['name'] = 'min_admin';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MIN_ADMIN';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '1.2';
++$c;
$modversion['config'][$c]['name'] = 'min_mysql';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MIN_MYSQL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '5.5';
++$c;
$modversion['config'][$c]['name'] = 'description';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_DESCRIPTION';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textarea';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'This module is for doing following...';
++$c;
$modversion['config'][$c]['name'] = 'author';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_AUTHOR';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'XOOPS Development Team';
++$c;
$modversion['config'][$c]['name'] = 'image';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_IMAGE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'empty.png';
++$c;
$modversion['config'][$c]['name'] = 'display_admin';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_DISPLAY_ADMIN_SIDE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 1;
++$c;
$modversion['config'][$c]['name'] = 'display_user';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_DISPLAY_USER_SIDE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 1;
++$c;
$modversion['config'][$c]['name'] = 'active_blocks';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_ACTIVE_BLOCKS';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 1;
++$c;
$modversion['config'][$c]['name'] = 'active_search';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_ACTIVE_SEARCH';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
$modversion['config'][$c]['name'] = 'active_comments';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_ACTIVE_COMMENTS';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
$modversion['config'][$c]['name'] = 'active_notifications';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_ACTIVE_NOTIFICATIONS';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
$modversion['config'][$c]['name'] = 'active_permissions';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_ACTIVE_PERMISSIONS';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
$modversion['config'][$c]['name'] = 'inroot_copy';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_INROOT_COPY';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
$modversion['config'][$c]['name'] = 'break' . $c;
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_BREAK_OPTIONAL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'line_break';
$modversion['config'][$c]['valuetype'] = 'textbox';
$modversion['config'][$c]['default'] = 'head';
++$c;
$modversion['config'][$c]['name'] = 'author_email';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_AUTHOR_EMAIL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'name@site.com';
++$c;
$modversion['config'][$c]['name'] = 'author_website_url';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_AUTHOR_WEBSITE_URL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'https://xoops.org';
++$c;
$modversion['config'][$c]['name'] = 'author_website_name';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_AUTHOR_WEBSITE_NAME';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'XOOPS Project';
++$c;
$modversion['config'][$c]['name'] = 'credits';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_CREDITS';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'XOOPS Development Team';
++$c;
$modversion['config'][$c]['name'] = 'license';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_LICENSE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'GPL 2.0 or later';
++$c;
$modversion['config'][$c]['name'] = 'license_url';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_LICENSE_URL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'http://www.gnu.org/licenses/old-licenses/gpl-2.0.html';
++$c;
$modversion['config'][$c]['name'] = 'repository';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_REPOSITORY';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'https://github.com/txmodxoops/TDMCreate-1.91';
++$c;
$modversion['config'][$c]['name'] = 'release_info';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_RELEASE_INFO';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'release_info';
++$c;
$modversion['config'][$c]['name'] = 'release_file';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_RELEASE_FILE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'release_info file';
++$c;
$modversion['config'][$c]['name'] = 'manual';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MANUAL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'link to manual file';
++$c;
$modversion['config'][$c]['name'] = 'manual_file';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_MANUAL_FILE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'install.txt';
++$c;
$modversion['config'][$c]['name'] = 'demo_site_url';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_DEMO_SITE_URL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'https://xoops.org';
++$c;
$modversion['config'][$c]['name'] = 'demo_site_name';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_DEMO_SITE_NAME';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'XOOPS Demo Site';
++$c;
$modversion['config'][$c]['name'] = 'support_url';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_SUPPORT_URL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'https://xoops.org/modules/newbb';
++$c;
$modversion['config'][$c]['name'] = 'support_name';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_SUPPORT_NAME';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'Support Forum';
++$c;
$modversion['config'][$c]['name'] = 'website_url';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_WEBSITE_URL';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'www.xoops.org';
++$c;
$modversion['config'][$c]['name'] = 'website_name';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_WEBSITE_NAME';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'XOOPS Project';
++$c;
$modversion['config'][$c]['name'] = 'release_date';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_RELEASE_DATE';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = date(_DBDATESTRING);
++$c;
$modversion['config'][$c]['name'] = 'status';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_STATUS';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'Beta 1';
++$c;
$modversion['config'][$c]['name'] = 'donations';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_PAYPAL_BUTTON';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '6KJ7RW5DR3VTJ';
++$c;
$modversion['config'][$c]['name'] = 'subversion';
$modversion['config'][$c]['title'] = '_MI_TDMCREATE_CONFIG_SUBVERSION';
$modversion['config'][$c]['description'] = '_MI_TDMCREATE_CONFIG_';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '13040';
unset($c);
