<?php
/**
 * WDS Project - WDS
 * @name WDS
 * @package WDS
 * @author Thuy Dinh Xuan
 * @version $1.0.1$
 * 11:11:19 PM - Aug 13, 2010
 * License http://wds.vn/license
 */

require_once('Zend/Cache.php');
class WDS
{
    public function __construct()
    {
        self::initRegistry();
        self::initLocale();
        self::initCache('WDS_', WEB_ROOT . '/data');
    }
    
    public static function initRegistry()
    {
        $registry = new \Zend_Registry(array(), ArrayObject::ARRAY_AS_PROPS);
        Zend_Registry::setInstance($registry);
    }
    
    public static function initLocale()
    {
        $settings = Zend_Registry::get('settings');
        if (empty($settings))
        {
           Zend_Registry::set('settings', new WDS_Application_Resource_Locale()); 
        }
    }
    
    public static function initCache($name, $cacheDir)
    {
        $feOpts = array(
        			'lifetime' => '7200',
        			'automatic_serialization'=>true);
        $bkOpts = array('cache_dir' => $cacheDir);
        $cache = Zend_Cache::factory($name, 'File',
                                      $feOpts, $bkOpts);
        return $cache;
    }
    
    
} 