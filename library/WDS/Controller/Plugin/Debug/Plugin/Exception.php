<?php
/**
 * WDS GROUP
 *
 * @name        Exception.php
 * @category    WDS
 * @package     Controller/Plugin   
 * @subpackage  Debug/Plugin
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 8:35:23 PM - 2011
 *
 * LICENSE
 *
 * This source file is copyrighted by WDS GROUP, full details in LICENSE.txt.
 * It is also available through the Internet at this URL:
 * http://wds.vn/license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the Internet, please send an email
 * to license@wds.vn so we can send you a copy immediately.
 *
 */
class WDS_Controller_Plugin_Debug_Plugin_Exception implements WDS_Controller_Plugin_Debug_Plugin_Interface
{
    protected static $_logger;
    
    /**
     * Contains plugin identifier name
     *
     * @var string
     */
    protected $_identifier = 'exception';

    /**
     * Contains any errors
     *
     * @var param array
     */
    static $errors = array();

    protected $_rendered = false;

    /**
     * Get the Debug logger
     *
     * @return Zend_Log
     */
    public static function getLogger()
    {
        if (!self::$_logger) {
            if ($wdsDebug = Zend_Controller_Front::getInstance()->getPlugin('WDS_Controller_Plugin_Debug')) {
                self::$_logger = $wdsDebug->getPlugin('Log')->getLog();
            } else {
                return false;
            }
        }
        return self::$_logger;
    }

    /**
     * Gets identifier for this plugin
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->_identifier;
    }
    
    /**
     * Returns the base64 encoded icon
     *
     * @return string
     **/
    public function getIconData()
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAJPSURBVDjLpZPLS5RhFMYfv9QJlelTQZwRb2OKlKuINuHGLlBEBEOLxAu46oL0F0QQFdWizUCrWnjBaDHgThCMoiKkhUONTqmjmDp2GZ0UnWbmfc/ztrC+GbM2dXbv4ZzfeQ7vefKMMfifyP89IbevNNCYdkN2kawkCZKfSPZTOGTf6Y/m1uflKlC3LvsNTWArr9BT2LAf+W73dn5jHclIBFZyfYWU3or7T4K7AJmbl/yG7EtX1BQXNTVCYgtgbAEAYHlqYHlrsTEVQWr63RZFuqsfDAcdQPrGRR/JF5nKGm9xUxMyr0YBAEXXHgIANq/3ADQobD2J9fAkNiMTMSFb9z8ambMAQER3JC1XttkYGGZXoyZEGyTHRuBuPgBTUu7VSnUAgAUAWutOV2MjZGkehgYUA6O5A0AlkAyRnotiX3MLlFKduYCqAtuGXpyH0XQmOj+TIURt51OzURTYZdBKV2UBSsOIcRp/TVTT4ewK6idECAihtUKOArWcjq/B8tQ6UkUR31+OYXP4sTOdisivrkMyHodWejlXwcC38Fvs8dY5xaIId89VlJy7ACpCNCFCuOp8+BJ6A631gANQSg1mVmOxxGQYRW2nHMha4B5WA3chsv22T5/B13AIicWZmNZ6cMchTXUe81Okzz54pLi0uQWp+TmkZqMwxsBV74Or3od4OISPr0e3SHa3PX0f3HXKofNH/UIG9pZ5PeUth+CyS2EMkEqs4fPEOBJLsyske48/+xD8oxcAYPzs4QaS7RR2kbLTTOTQieczfzfTv8QPldGvTGoF6/8AAAAASUVORK5CYII=';
    }

    /**
     * Creates Error Plugin ans sets the Error Handler
     *
     * @return void
     */
    public function __construct()
    {
        set_error_handler(array($this , 'errorHandler'));
    }

    /**
     * Gets menu tab for the Debugbar
     *
     * @return string
     */
    public function getTab()
    {
        $response = Zend_Controller_Front::getInstance()->getResponse();
        foreach ($response->getException() as $e) {
            $exception = get_class($e) . ': ' . $e->getMessage() 
                       . ' thrown in ' . str_replace($_SERVER['DOCUMENT_ROOT'], '', $e->getFile())
                       . ' on line ' . $e->getLine();
            $exception .= '<ol>';
            foreach ($e->getTrace() as $t) {
                $func = $t['function'] . '()';
                if (isset($t['class']))
                    $func = $t['class'] . $t['type'] . $func;
                if (! isset($t['file']))
                    $t['file'] = 'unknown';
                if (! isset($t['line']))
                    $t['line'] = 'n/a';
                $exception .= '<li>' . $func . ' in ' 
                       . str_replace($_SERVER['DOCUMENT_ROOT'], '', $t['file']) 
                       . ' on line ' . $t['line'] . '</li>';
            }
            $exception .= '</ol>';
            if ($logger = self::getLogger())
                $logger->crit($exception);
        }
        return '';
    }

    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        $this->_rendered = true;
        return '';
    }
    
    /**
     * Debug Bar php error handler
     *
     * @param string $level
     * @param string $message
     * @param string $file
     * @param string $line
     * @return bool
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (! ($level & error_reporting()))
            return false;
        switch ($level) {
            case E_NOTICE:
            case E_USER_NOTICE:
                $method = 'notice';
                $type = 'Notice';
                break;
            case E_WARNING:
            case E_USER_WARNING:
                $method = 'warn';
                $type = 'Warning';
                break;
            case E_ERROR:
            case E_USER_ERROR:
                $method = 'crit';
                $type = 'Fatal Error';
                break;
            default:
                $method = 'err';
                $type = 'Unknown, ' . $level;
                break;
        }
        self::$errors[] = array(
            'type' => $type , 
            'message' => $message , 
            'file' => $file , 
            'line' => $line,
            'trace' => debug_backtrace()
        );

        $message = sprintf(
            "%s in %s on line %d", 
            $message, 
            str_replace($_SERVER['DOCUMENT_ROOT'], '', $file),
            $line
        );
        // if (ini_get('log_errors'))
        //     error_log(sprintf("%s: %s", $type, $message));

        if (($logger = self::getLogger())) {
            $logger->$method($message);
        }
        return false;
    }
}