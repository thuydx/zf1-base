<?php

/**
 * WDS Project - 
 * @name 
 * @package 
 * @author Thuy Dinh Xuan - WDS
 * @version $$
 * @license http://wds.vn/license
 * @copyright WDS Group (c) 2008 - 2010 . All right reserved.
 *  11:13:13 PM - Mar 31, 2010
 */

require_once('Zend/View/Helper/Abstract.php');

class WDS_View_Helper_Fckeditor extends \Zend_View_Helper_Abstract
{
    public function fckeditor($name, $value = '', $width = '640', $height = '320', $skin = 'silver', $toolBarSet = false)
    {
        require_once(PUBLIC_PATH . $this->view->pathScript . 'fckeditor/fckeditor.php');
        
        $basePath = $this->view->serverUrl() . $this->view->pathScript . "fckeditor/";
                              // http://localhost/public/js/fckeditor/
        $fckEditor = new FCKeditor($name);

        $fckEditor->Config['SkinPath'] = $basePath . "editor/skins/$skin/";
                                // http://localhost/public/js/fckeditor/editor/skins/silver/
        $fckEditor->Config['AutoDetectLanguage'] = false;                        
        
        if (!$toolBarSet) {
            $fckEditor->ToolbarSet = $toolBarSet;
        }
        
        $fckEditor->Width = $width;
        $fckEditor->Height = $height;
        $fckEditor->BasePath = $basePath;
        $fckEditor->Value = $value;

        return $fckEditor->CreateHtml();
    }
}