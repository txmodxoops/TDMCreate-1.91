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
 * @version         $Id: AdminPages.php 12258 2014-01-02 09:33:29Z timgno $
 */
defined('XOOPS_ROOT_PATH') || die('Restricted access');
/**
 * Class AdminPages.
 */
class AdminPages extends TDMCreateFile
{
    /*
     * @var string
     */
    private $adminxoopscode;

    /*
     * @var string
     */
    private $t2 = "\t\t";

    /*
     * @public function constructor
     * @param null    
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->tdmcfile = TDMCreateFile::getInstance();
        $this->phpcode = TDMCreatePhpCode::getInstance();
        $this->xoopscode = TDMCreateXoopsCode::getInstance();
        $this->adminxoopscode = AdminXoopsCode::getInstance();
    }

    /*
     * @static function &getInstance
     * @param null 
     *
     * @return AdminPages
     */
    public static function &getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /*
    *  @public function write
    *  @param $module
    *  @param $table
    */
    public function write($module, $table)
    {
        $this->setModule($module);
        $this->setTable($table);
    }

    /*
    *  @private function getAdminPagesHeader
    *  @param $moduleDirname
    *  @param $tableName
    *  @param $fieldId
    *  @return string
    */
    private function getAdminPagesHeader($moduleDirname, $tableName, $fieldId)
    {
        $ucfModuleDirname = ucfirst($moduleDirname);
        $ucfTableName = ucfirst($tableName);
        $ccFieldId = $this->getCamelCase($fieldId, false, true);
        $ret = $this->getInclude();
        $ret .= $this->getCommentLine('It recovered the value of argument op in URL$');
        $ret .= $this->xoopscode->getXoopsCodeXoopsRequest('op', 'op', 'list');
        $ret .= $this->getCommentLine("Request {$fieldId}");
        $ret .= $this->xoopscode->getXoopsCodeXoopsRequest($ccFieldId, $fieldId, '', 'Int');

        return $ret;
    }

    /*
     *  @private function getAdminPagesSwitch
     *  @param $cases
     *
     * @return string
     */
    private function getAdminPagesSwitch($cases = array())
    {
        $contentSwitch = $this->phpcode->getPhpCodeCaseSwitch($cases, true);

        return $this->phpcode->getPhpCodeSwitch('op', $contentSwitch);
    }

    /*
    *  @private function getAdminPagesList
    *  @param $moduleDirname
    *  @param $table
    *  @param $tableFieldname
    *  @param $language
    *  @param $fields
    *  @param $fieldId
    *  @param $fieldInForm
    *  @param $fieldMain
    *  @return string
    */
    private function getAdminPagesList($moduleDirname, $table, $language, $fields, $fieldId, $fieldInForm, $fieldMain)
    {
        $stuModuleDirname = strtoupper($moduleDirname);
        $tableName = $table->getVar('table_name');
        $tableSoleName = $table->getVar('table_solename');
        $tableFieldname = $table->getVar('table_fieldname');
        $ucfTableName = ucfirst($tableName);
        $stuTableName = strtoupper($tableName);
        $stuTableSoleName = strtoupper($tableSoleName);
        $stuTableFieldname = strtoupper($tableFieldname);
        $tableAutoincrement = $table->getVar('table_autoincrement');

        $ret = $this->xoopscode->getXoopsCodeXoopsRequest('start', 'start', '0', 'Int');
        $adminpager = $this->xoopscode->getXoopsCodeGetConfig($moduleDirname, 'adminpager');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeXoopsRequest('limit', 'limit', $adminpager, 'Int');
        $ret .= $this->t2.$this->adminxoopscode->getAdminTemplateMain($moduleDirname, $tableName);
        $navigation = $this->adminxoopscode->getAdminAddNavigation($tableName);
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('navigation', $navigation);

        if (1 == $fieldInForm) {
            $ret .= $this->t2.$this->adminxoopscode->getAdminItemButton($language, $tableName, $stuTableSoleName, '?op=new', 'add');
            $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('buttons', '$adminMenu->renderButton()');
        }

        $ret .= $this->t2.$this->xoopscode->getXoopsCodeObjHandlerCount($tableName);
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeObjHandlerAll($tableName, '', '$start', '$limit');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign("{$tableName}_count", "\${$tableName}Count");
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign("{$moduleDirname}_url", "{$stuModuleDirname}_URL");
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign("{$moduleDirname}_upload_url", "{$stuModuleDirname}_UPLOAD_URL");

        $ret .= $this->t2.$this->getCommentLine('Table view');
        $contentForeach = $this->xoopscode->getXoopsCodeGetValues($tableName, $tableSoleName);
        $contentForeach .= $this->xoopscode->getXoopsCodeXoopsTplAppend("{$tableName}_list", "\${$tableSoleName}");
        $contentForeach .= $this->phpcode->getPhpCodeUnset($tableSoleName);
        $condIf = $this->phpcode->getPhpCodeForeach("{$tableName}All", true, false, 'i', $contentForeach);
        $condIf .= $this->xoopscode->getXoopsCodePageNav($tableName);
        $condElse = $this->xoopscode->getXoopsCodeTplAssign('error', "{$language}THEREARENT_{$stuTableName}");
        $ret .= $this->phpcode->getPhpCodeConditions("\${$tableName}Count", ' > ', '0', $condIf, $condElse, "\t\t");

        return $ret;
    }

    /*
    *  @private function getAdminPagesNew
    *  @param $moduleDirname
    *  @param $tableName
    *  @param $fieldInForm
    *  @param $language
    *  @return string
    */
    private function getAdminPagesNew($moduleDirname, $tableName, $tableSoleName, $fieldInForm, $language)
    {
        $stuTableName = strtoupper($tableName);
        $stuTableSoleName = strtoupper($tableSoleName);
        $ucfTableName = ucfirst($tableName);

        $ret = $this->t2.$this->adminxoopscode->getAdminTemplateMain($moduleDirname, $tableName);
        $navigation = $this->adminxoopscode->getAdminAddNavigation($tableName);
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('navigation', $navigation);

        if (1 == $fieldInForm) {
            $ret .= $this->t2.$this->adminxoopscode->getAdminItemButton($language, $tableName, $stuTableSoleName, '', 'list');
            $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('buttons', '$adminMenu->renderButton()');
        }
        $ret .= $this->t2.$this->getCommentLine('Get Form');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeObjHandlerCreate($tableName);
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeGetForm('form', $tableName, 'Obj');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('form', '$form->render()');

        return $ret;
    }

    /*
    *  @private function getAdminPagesSave
    *  @param $moduleDirname
    *  @param $tableName
    *  @param $language
    *  @param $fields
    *  @param $fieldId
    *  @param $fieldMain
    *  @return string
    */
    private function getAdminPagesSave($moduleDirname, $tableName, $language, $fields, $fieldId, $fieldMain)
    {
        $ccFieldId = $this->getCamelCase($fieldId, false, true);
        $ucfTableName = ucfirst($tableName);

        $ret = $this->phpcode->getPhpCodeCommentLine('Security Check');
        $xoopsSecurityCheck = $this->xoopscode->getXoopsCodeSecurityCheck();
        $securityError = $this->xoopscode->getXoopsCodeSecurityErrors();
        $implode = $this->phpcode->getPhpCodeImplode(',', $securityError);
        $redirectError = $this->xoopscode->getXoopsCodeRedirectHeader($tableName, '', '3', $implode);
        $ret .= $this->phpcode->getPhpCodeConditions($xoopsSecurityCheck, '', '', $redirectError, false, "\t");

        $isset = $this->phpcode->getPhpCodeIsset($ccFieldId);
        $contentIf = $this->xoopscode->getXoopsCodeGet($tableName, $ccFieldId, 'Obj', true);
        $contentElse = $this->xoopscode->getXoopsCodeObjHandlerCreate($tableName);
        $ret .= $this->phpcode->getPhpCodeConditions($isset, '', '', $contentIf, $contentElse, "\t");
        $ret .= $this->phpcode->getPhpCodeCommentLine('Set Vars');
        foreach (array_keys($fields) as $f) {
            $fieldName = $fields[$f]->getVar('field_name');
            $fieldType = $fields[$f]->getVar('field_type');
            $fieldElement = $fields[$f]->getVar('field_element');
            if ($f > 0) { // If we want to hide field id
                switch ($fieldElement) {
                    case 5:
                    case 6:
                        $ret .= $this->xoopscode->getXoopsCodeCheckBoxOrRadioYNSetVar($tableName, $fieldName);
                        break;
                    case 10:
                        $ret .= $this->xoopscode->getXoopsCodeImageListSetVar($moduleDirname, $tableName, $fieldName);
                        break;
                    case 12:
                        $ret .= $this->xoopscode->getXoopsCodeUrlFileSetVar($moduleDirname, $tableName, $fieldName);
                        break;
                    case 13:
                        if (1 == $fields[$f]->getVar('field_main')) {
                            $fieldMain = $fieldName;
                        }
                        $ret .= $this->xoopscode->getXoopsCodeUploadImageSetVar($moduleDirname, $tableName, $fieldName, $fieldMain);
                        break;
                    case 14:
                        $ret .= $this->xoopscode->getXoopsCodeUploadFileSetVar($moduleDirname, $tableName, $fieldName);
                        break;
                    case 15:
                        $ret .= $this->xoopscode->getXoopsCodeTextDateSelectSetVar($tableName, $fieldName);
                        break;
                    default:
                        if ($fieldType == 2 || $fieldType == 7 || $fieldType == 8) {
                            $ret .= $this->xoopscode->getXoopsCodeSetVar($tableName, $fieldName, "isset(\$_POST['{$fieldName}']) ? \$_POST['{$fieldName}'] : 0");
                        } else {
                            $ret .= $this->xoopscode->getXoopsCodeSetVar($tableName, $fieldName, "\$_POST['{$fieldName}']");
                        }
                        break;
                }
            }
        }
        $ret .= $this->t2.$this->getCommentLine('Insert Data');
        $insert = $this->xoopscode->getXoopsCodeInsert($tableName, $tableName, 'Obj', true);
        $confirmOk = $this->xoopscode->getXoopsCodeRedirectHeader($tableName, '?op=list', '2', "{$language}FORM_OK");
        $ret .= $this->phpcode->getPhpCodeConditions($insert, '', '', $confirmOk, false, "\t");
        $ret .= $this->t2.$this->getCommentLine('Get Form');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('error', "\${$tableName}Obj->getHtmlErrors()");
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeGetForm('form', $tableName, 'Obj');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('form', '$form->render()');

        return $ret;
    }

    /*
    *  @private function getAdminPagesEdit
    *  @param $moduleDirname
    *  @param $tableName
    *  @param $tableFieldname
    *  @param $language
    *  @param $fieldId
    *  @param $fieldInForm
    *  @return string
    */
    private function getAdminPagesEdit($moduleDirname, $table, $language, $fieldId, $fieldInForm)
    {
        $tableName = $table->getVar('table_name');
        $tableSoleName = $table->getVar('table_solename');
        $tableFieldname = $table->getVar('table_fieldname');
        $stuTableName = strtoupper($tableName);
        $ucfTableName = ucfirst($tableName);
        $stuTableSoleName = strtoupper($tableSoleName);
        $stuTableFieldname = strtoupper($tableFieldname);
        $ccFieldId = $this->getCamelCase($fieldId, false, true);

        $ret = $this->t2.$this->adminxoopscode->getAdminTemplateMain($moduleDirname, $tableName);
        $navigation = $this->adminxoopscode->getAdminAddNavigation($tableName);
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('navigation', $navigation);

        if (1 == $fieldInForm) {
            $ret .= $this->t2.$this->adminxoopscode->getAdminItemButton($language, $tableName, $stuTableSoleName, '?op=new', 'add');
            $ret .= $this->t2.$this->adminxoopscode->getAdminItemButton($language, $tableName, $stuTableSoleName, '', 'list');
            $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('buttons', '$adminMenu->renderButton()');
        }
        $ret .= $this->t2.$this->getCommentLine('Get Form');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeGet($tableName, $ccFieldId, 'Obj', true);
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeGetForm('form', $tableName, 'Obj');
        $ret .= $this->t2.$this->xoopscode->getXoopsCodeTplAssign('form', '$form->render()');

        return $ret;
    }

    /*
    *  @private function getAdminPagesDelete
    *  @param $tableName
    *  @param $language
    *  @param $fieldId
    *  @param $fieldMain
    *  @return string
    */
    private function getAdminPagesDelete($tableName, $language, $fieldId, $fieldMain)
    {
        return $this->xoopscode->getXoopsCodeCaseDelete($language, $tableName, $fieldId, $fieldMain);
    }

    /*
    *  @private function getAdminPagesUpdate
    *  @param $language
    *  @param $tableName
    *  @param $fieldId
    *  @param $fieldName
    *  @return string
    */
    private function getAdminPagesUpdate($language, $tableName, $fieldId, $fieldName)
    {
        return $this->xoopscode->getXoopsCodeUpdate($language, $tableName, $fieldId, $fieldName);
    }

    /*
     * @public function render    
     * @param $filename
     *
     * @return bool|string
     */
    public function renderFile($filename)
    {
        $module = $this->getModule();
        $table = $this->getTable();
        $moduleDirname = $module->getVar('mod_dirname');
        $tableName = $table->getVar('table_name');
        $tableSoleName = $table->getVar('table_solename');
        $language = $this->getLanguage($moduleDirname, 'AM');
        $fields = $this->tdmcfile->getTableFields($table->getVar('table_mid'), $table->getVar('table_id'));
        foreach (array_keys($fields) as $f) {
            $fieldName = $fields[$f]->getVar('field_name');
            $fieldInForm = $fields[$f]->getVar('field_inform');
            if (0 == $f) {
                $fieldId = $fieldName;
            }
            if (1 == $fields[$f]->getVar('field_main')) {
                $fieldMain = $fieldName;
            }
        }
        $content = $this->getHeaderFilesComments($module, $filename);
        $content .= $this->getAdminPagesHeader($moduleDirname, $tableName, $fieldId);
        $list = $this->getAdminPagesList($moduleDirname, $table, $language, $fields, $fieldId, $fieldInForm, $fieldMain);
        if (1 == $fieldInForm) {
            $new = $this->getAdminPagesNew($moduleDirname, $tableName, $tableSoleName, $fieldInForm, $language);
            $save = $this->getAdminPagesSave($moduleDirname, $tableName, $language, $fields, $fieldId, $fieldMain);
            $edit = $this->getAdminPagesEdit($moduleDirname, $table, $language, $fieldId, $fieldInForm);
        }
        $delete = $this->getAdminPagesDelete($tableName, $language, $fieldId, $fieldMain);

        $cases = array('list' => array($list),
                        'new' => array($new),
                        'save' => array($save),
                        'edit' => array($edit),
                        'delete' => array($delete), );
        $content .= $this->getAdminPagesSwitch($cases);
        $content .= $this->getInclude('footer');
        //
        $this->tdmcfile->create($moduleDirname, 'admin', $filename, $content, _AM_TDMCREATE_FILE_CREATED, _AM_TDMCREATE_FILE_NOTCREATED);

        return $this->tdmcfile->renderFile();
    }
}
