<?php

/**
 * WDS Project - WDS
 * @name Browser
 * @package WDS/View/Helper
 * @author Thuy Dinh Xuan
 * @version $1.0.1$
 * 11:47:07 PM - Aug 13, 2010
 * License http://wds.vn/license
 */
 
 

require_once('Zend/View/Helper/Abstract.php');

class WDS_View_Helper_Browser extends \Zend_View_Helper_Abstract
{
    CONST IE        = 'ie';
    CONST FIREFOX   = 'firefox';
    CONST CHROME    = 'chrome';
    CONST SAFARI    = 'safari';
    CONST OPERA     = 'opera';

    public function browser()
    {
        $browser = self::IE;
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if (false !== strpos($agent, 'Firefox')) {
            $browser = self::FIREFOX;
        } elseif (false !== strpos($agent, 'Chrome')) {
            $browser = self::CHROME;
        } elseif (false !== strpos($agent, 'Safari')) {
            $browser = self::SAFARI;
        } elseif (false !== strpos($agent, 'Opera')) {
            $browser = self::OPERA;
        } else {
            $browser = self::IE;
        }
        return $browser;
    }
}