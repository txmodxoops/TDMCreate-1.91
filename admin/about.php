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
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.5.0
 *
 * @author          Txmod Xoops http://www.txmodxoops.org
 *
 * @version         $Id: about.php 11084 2013-02-23 15:44:20Z timgno $
 */
include __DIR__.'/header.php';
$templateMain = 'tdmcreate_about.tpl';
$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->displayNavigation('about.php'));
$about = $adminMenu->renderAbout($adminMenu->setPaypal('7LFE862PGJN88'), false);
$aboutRes = TDMCreate_MakeDonationForm($about);
$GLOBALS['xoopsTpl']->assign('maintained', sprintf(_AM_TDMCREATE_MAINTAINED, $GLOBALS['xoopsModule']->getVar('name')));
$GLOBALS['xoopsTpl']->assign('about', $aboutRes);
include __DIR__.'/footer.php';
