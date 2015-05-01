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
 * tdmcreate module
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         tdmcreate
 * @since           2.5.0
 * @author          Txmod Xoops http://www.txmodxoops.org
 * @version         $Id: tables.php 12258 2014-01-02 09:33:29Z timgno $
 */
include  __DIR__ . '/header.php';
// Recovered value of arguments op in the URL $
$op = XoopsRequest::getString('op', 'list');
//
$mod_id = XoopsRequest::getInt('mod_id');
// Request vars
$tableId         = XoopsRequest::getInt('table_id');
$tableMid        = XoopsRequest::getInt('table_mid');
$tableName       = XoopsRequest::getInt('table_name');
$tableNumbFields = XoopsRequest::getInt('table_nbfields');
$tableOrder      = XoopsRequest::getInt('table_order');
$tableFieldname  = XoopsRequest::getString('table_fieldname', '');
//
switch ($op) {
    case 'list':
    default:
        $start = XoopsRequest::getInt('start', 0);
        $limit = XoopsRequest::getInt('limit', $tdmcreate->getConfig('modules_adminpager'));
        // Define main template
        $template_main = 'tdmcreate_tables.tpl';
        $GLOBALS['xoTheme']->addStylesheet('modules/tdmcreate/assets/css/admin/style.css');
        $GLOBALS['xoTheme']->addScript('modules/tdmcreate/assets/js/functions.js');
        $GLOBALS['xoTheme']->addScript('modules/tdmcreate/assets/js/sortable.js');
        $GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('tables.php'));
        $adminMenu->addItemButton(_AM_TDMCREATE_ADD_TABLE, 'tables.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());
        $GLOBALS['xoopsTpl']->assign('tdmc_url', TDMC_URL);
        $GLOBALS['xoopsTpl']->assign('tdmc_icons_url', TDMC_ICONS_URL);
        $GLOBALS['xoopsTpl']->assign('tdmc_upload_imgmod_url', TDMC_UPLOAD_IMGMOD_URL);
        /*$tdmc_upload_image_url = is_dir($sysPathIcon32) ? $sysPathIcon32 : TDMC_UPLOAD_IMGTAB_PATH;
        $GLOBALS['xoopsTpl']->assign('tdmc_table_image_url', $tdmc_upload_image_url);*/
        $GLOBALS['xoopsTpl']->assign('tdmc_upload_imgtab_url', TDMC_UPLOAD_IMGTAB_URL);
        $GLOBALS['xoopsTpl']->assign('modPathIcon16', $modPathIcon16);
        $GLOBALS['xoopsTpl']->assign('sysPathIcon32', $sysPathIcon32);
        // Get the list of modules
        $criteria = new CriteriaCompo();
        $criteria->setStart($start);
        $criteria->setLimit($limit);
        $criteria->setSort('mod_id ASC, mod_name');
        $criteria->setOrder('ASC');
        $numbModules = $tdmcreate->getHandler('modules')->getCount($criteria);
        // Redirect if there aren't modules
        if (0 == $numbModules) {
            redirect_header('modules.php?op=new', 10, _AM_TDMCREATE_NOTMODULES);
        }
        $mods_arr = $tdmcreate->getHandler('modules')->getAll($criteria);
        unset($criteria);
        $numbTables = $tdmcreate->getHandler('tables')->getObjects(null);
        // Redirect if there aren't tables
        if (0 == $numbTables) {
            redirect_header('tables.php?op=new', 10, _AM_TDMCREATE_NOTTABLES);
        }
        unset($numbTables);
        // Display modules list
        if ($numbModules > 0) {
            foreach (array_keys($mods_arr) as $i) {
                $mod['id']            = $i;
                $mod['name']          = $mods_arr[$i]->getVar('mod_name');
                $mod['image']         = $mods_arr[$i]->getVar('mod_image');
                $mod['admin']         = $mods_arr[$i]->getVar('mod_admin');
                $mod['user']          = $mods_arr[$i]->getVar('mod_user');
                $mod['blocks']        = $mods_arr[$i]->getVar('mod_blocks');
                $mod['search']        = $mods_arr[$i]->getVar('mod_search');
                $mod['comments']      = $mods_arr[$i]->getVar('mod_comments');
                $mod['notifications'] = $mods_arr[$i]->getVar('mod_notifications');
                $mod['permissions']   = $mods_arr[$i]->getVar('mod_permissions');
                // Get the list of tables
                $criteria = new CriteriaCompo();
                $criteria->add(new Criteria('table_mid', $i));
                $criteria->setSort('table_order ASC, table_id ASC, table_name');
                $criteria->setOrder('ASC');
                $numbTables = $tdmcreate->getHandler('tables')->getCount($criteria);
                $tables_arr = $tdmcreate->getHandler('tables')->getAll($criteria);
                unset($criteria);
                // Display tables list
                $tables = array();
                $lid    = 1;
                if ($numbTables > 0) {
                    foreach (array_keys($tables_arr) as $t) {
                        $table['id']            = $t;
                        $table['lid']           = $lid;
                        $table['mid']           = $tables_arr[$t]->getVar('table_mid');
                        $table['name']          = ucfirst($tables_arr[$t]->getVar('table_name'));
                        $table['image']         = $tables_arr[$t]->getVar('table_image');
                        $table['nbfields']      = $tables_arr[$t]->getVar('table_nbfields');
                        $table['order']         = $tables_arr[$t]->getVar('table_order');
                        $table['blocks']        = $tables_arr[$t]->getVar('table_blocks');
                        $table['admin']         = $tables_arr[$t]->getVar('table_admin');
                        $table['user']          = $tables_arr[$t]->getVar('table_user');
                        $table['submenu']       = $tables_arr[$t]->getVar('table_submenu');
                        $table['search']        = $tables_arr[$t]->getVar('table_search');
                        $table['comments']      = $tables_arr[$t]->getVar('table_comments');
                        $table['notifications'] = $tables_arr[$t]->getVar('table_notifications');
                        $table['permissions']   = $tables_arr[$t]->getVar('table_permissions');
                        $tables[]               = $table;
                        unset($table);
                        ++$lid;
                    }
                }
                unset($lid);
                $mod['tables'] = $tables;
                $GLOBALS['xoopsTpl']->append('modules_list', $mod);
                unset($mod);
            }
            if ($numbModules > $limit) {
                include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new XoopsPageNav($numbModules, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', _AM_TDMCREATE_THEREARENT_TABLES);
        }
        break;

    case 'new':
        // Define main template
        $template_main = 'tdmcreate_tables.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('tables.php'));
        $adminMenu->addItemButton(_AM_TDMCREATE_TABLES_LIST, 'tables.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());

        $tablesObj =& $tdmcreate->getHandler('tables')->create();
        $form      = $tablesObj->getForm();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('tables.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        //
        $tables =& $tdmcreate->getHandler('tables');
        //
        if (isset($tableId)) {
            $tablesObj =& $tables->get($tableId);			
        } else {            
         			// Checking if table name exist
         			$criteria = new CriteriaCompo();
         			$criteria->add(new Criteria('table_mid', $tableMid));
         			$table_name_search = $tables->getObjects($criteria);
         			//unset($criteria);
         			foreach (array_keys($table_name_search) as $t) {
         				   if ($table_name_search[$t]->getVar('table_name') === $_POST['table_name']) {
         				  	redirect_header('tables.php?op=new', 3, sprintf(_AM_TDMCREATE_ERROR_TABLE_NAME_EXIST, $_POST['table_name']));
         				   }
         			}
     			    $tablesObj =& $tables->create();
        }
        $order = $tablesObj->isNew() ? $tableOrder + 1 : $tableOrder;
        // Form save tables
        $tablesObj->setVars(array(
                                'table_mid'       => $tableMid,
                                'table_name'      => $_POST['table_name'],
                                'table_category'  => $_REQUEST['table_category'],
                                'table_nbfields'  => $tableNumbFields,
                                'table_order'     => $order,
                                'table_fieldname' => $tableFieldname));
        //Form table_image
        include_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploaddir = is_dir(XOOPS_ICONS32_PATH) ? XOOPS_ICONS32_PATH : TDMC_UPLOAD_IMGTAB_PATH;
        $uploader  = new XoopsMediaUploader($uploaddir, $tdmcreate->getConfig('mimetypes'),
                                            $tdmcreate->getConfig('maxsize'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1)', 3, $errors);
            } else {
                $tablesObj->setVar('table_image', $uploader->getSavedFileName());
            }
        } else {
            $tablesObj->setVar('table_image', $_POST['table_image']);
        }
        $tablesObj->setVars(array(
                                'table_autoincrement' => $_REQUEST['table_autoincrement'],
                                'table_blocks'        => $_REQUEST['table_blocks'],
                                'table_admin'         => $_REQUEST['table_admin'],
                                'table_user'          => $_REQUEST['table_user'],
                                'table_submenu'       => $_REQUEST['table_submenu'],
                                'table_submit'        => $_REQUEST['table_submit'],
                                'table_tag'           => $_REQUEST['table_tag'],
                                'table_broken'        => $_REQUEST['table_broken'],
                                'table_search'        => $_REQUEST['table_search'],
                                'table_comments'      => $_REQUEST['table_comments'],
                                'table_notifications' => $_REQUEST['table_notifications'],
                                'table_permissions'   => $_REQUEST['table_permissions'],
                                'table_rate'          => $_REQUEST['table_rate'],
                                'table_print'         => $_REQUEST['table_print'],
                                'table_pdf'           => $_REQUEST['table_pdf'],
                                'table_rss'           => $_REQUEST['table_rss'],
                                'table_single'        => $_REQUEST['table_single'],
                                'table_visit'         => $_REQUEST['table_visit']
                            ));
        //
        if ($tables->insert($tablesObj)) {
            if ($tablesObj->isNew()) {
                $tableTid    = $GLOBALS['xoopsDB']->getInsertId();
                $tableAction = '&field_mid=' . $tableMid . '&field_tid=' . $tableTid . '&field_numb=' . $tableNumbFields . '&field_name=' . $tableFieldname;
                redirect_header('fields.php?op=new' . $tableAction, 5, sprintf(_AM_TDMCREATE_TABLE_FORM_CREATED_OK, $_POST['table_name']));
            } else {
                // Get fields where table id
                $fields    =& $tdmcreate->getHandler('fields');
                $fieldsObj = $fields->get($tableId);
                $fieldsObj->setVar('field_numb', $tableNumbFields);
                $fields->insert($fieldsObj);
                redirect_header('tables.php', 5, sprintf(_AM_TDMCREATE_TABLE_FORM_UPDATED_OK, $_POST['table_name']));
            }
        }
        //
        $GLOBALS['xoopsTpl']->assign('error', $tablesObj->getHtmlErrors());
        $form = $tablesObj->getForm();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;

    case 'edit':
        // Define main template
        $template_main = 'tdmcreate_tables.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('tables.php'));
        $adminMenu->addItemButton(_AM_TDMCREATE_ADD_TABLE, 'tables.php?op=new', 'add');
        $adminMenu->addItemButton(_AM_TDMCREATE_TABLES_LIST, 'tables.php?op=list', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());

        $tablesObj = $tdmcreate->getHandler('tables')->get($tableId);
        $form      = $tablesObj->getForm();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;

    case 'order':
        // Initialize tables handler
        $tablesObj = $tdmcreate->getHandler('tables');
        if (isset($_POST['torder'])) {
            $i = 0;
            foreach ($_POST['torder'] as $order) {
                if ($order > 0) {
                    $tableOrder = $tablesObj->get($order);
                    $tableOrder->setVar('table_order', $i);
                    if (!$tablesObj->insert($tableOrder)) {
                        $error = true;
                    }
                    ++$i;
                }
            }
            redirect_header('tables.php', 5, _AM_TDMCREATE_TABLE_ORDER_ERROR);
            unset($i);
        }
        exit;
        break;

    case 'delete':
        $tablesObj =& $tdmcreate->getHandler('tables')->get($tableId);
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('tables.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($tdmcreate->getHandler('tables')->delete($tablesObj)) {
                redirect_header('tables.php', 3, _AM_TDMCREATE_FORMDELOK);
            } else {
                echo $tablesObj->getHtmlErrors();
            }
        } else {
            xoops_confirm(array('ok' => 1, 'table_id' => $tableId, 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_TDMCREATE_FORMSUREDEL, $tablesObj->getVar('table_name')));
        }
        break;

    case 'display_modules':
        foreach ($_POST['mod_id'] as $key => $value) {
            $moduleAdmin         = XoopsRequest::getInt('mod_admin');
            $moduleUser          = XoopsRequest::getInt('mod_user');
            $moduleBlocks        = XoopsRequest::getInt('mod_blocks');
            $moduleSearch        = XoopsRequest::getInt('mod_search');
            $moduleComments      = XoopsRequest::getInt('mod_comments');
            $moduleNotifications = XoopsRequest::getInt('mod_notifications');
            $modulePermissions   = XoopsRequest::getInt('mod_permissions');

            if ($tableMid > 0) {
                $modulesObj =& $tdmcreate->getHandler('modules')->get($tableMid);
                $modulesObj->setVar('mod_admin', ((isset($_REQUEST['mod_admin'][$key]) == 1) ? 0 : 1));
                $modulesObj->setVar('mod_user', ((isset($_REQUEST['mod_user'][$key]) == 1) ? 0 : 1));
                $modulesObj->setVar('mod_blocks', ((isset($_REQUEST['mod_blocks'][$key]) == 1) ? 0 : 1));
                $modulesObj->setVar('mod_search', ((isset($_REQUEST['mod_search'][$key]) == 1) ? 0 : 1));
                $modulesObj->setVar('mod_comments', ((isset($_REQUEST['mod_comments'][$key]) == 1) ? 0 : 1));
                $modulesObj->setVar('mod_notifications', ((isset($_REQUEST['mod_notifications'][$key]) == 1) ? 0 : 1));
                $modulesObj->setVar('mod_permissions', ((isset($_REQUEST['mod_permissions'][$key]) == 1) ? 0 : 1));
                if ($tdmcreate->getHandler('modules')->insert($modulesObj, true)) {
                    redirect_header('modules.php', 1, _AM_TDMCREATE_TOGGLE_SUCCESS);
                } else {
                    redirect_header('modules.php', 1, _AM_TDMCREATE_TOGGLE_FAILED);
                }
            }
        }
        break;

    case 'display_tables':
        foreach ($_POST['table_id'] as $key => $value) {
            $tableAdmin         = XoopsRequest::getInt('table_admin');
            $tableUser          = XoopsRequest::getInt('table_user');
            $tableBlocks        = XoopsRequest::getInt('table_blocks');
            $tableSubmenu       = XoopsRequest::getInt('table_submenu');
            $tableSearch        = XoopsRequest::getInt('table_search');
            $tableComments      = XoopsRequest::getInt('table_comments');
            $tableNotifications = XoopsRequest::getInt('table_notifications');
            $tablePermissions   = XoopsRequest::getInt('table_permissions');

            if ($tableId > 0) {
                $tablesObj =& $tdmcreate->getHandler('tables')->get($tableId);
                $tablesObj->setVar('table_admin', ((isset($_REQUEST['table_admin'][$key]) == 1) ? 0 : 1));
                $tablesObj->setVar('table_user', ((isset($_REQUEST['table_user'][$key]) == 1) ? 0 : 1));
                $tablesObj->setVar('table_blocks', ((isset($_REQUEST['table_blocks'][$key]) == 1) ? 0 : 1));
                $tablesObj->setVar('table_submenu', ((isset($_REQUEST['table_submenu'][$key]) == 1) ? 0 : 1));
                $tablesObj->setVar('table_search', ((isset($_REQUEST['table_search'][$key]) == 1) ? 0 : 1));
                $tablesObj->setVar('table_comments', ((isset($_REQUEST['table_comments'][$key]) == 1) ? 0 : 1));
                $tablesObj->setVar('table_notifications', ((isset($_REQUEST['table_notifications'][$key]) == 1) ? 0 : 1));
                if ($tdmcreate->getHandler('tables')->insert($tablesObj, true)) {
                    redirect_header('tables.php', 1, _AM_TDMCREATE_TOGGLE_SUCCESS);
                } else {
                    redirect_header('tables.php', 1, _AM_TDMCREATE_TOGGLE_FAILED);
                }
            }
        }
        break;
}
include  __DIR__ . '/footer.php';
