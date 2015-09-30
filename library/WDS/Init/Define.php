<?php
/**
 * WDS GROUP
 *
 * @name        Define.php
 * @category    WDS
 * @package     Init
 * @author      Thuy Dinh Xuan
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $ 0.1.0 $
 * 10:53:38 AM - Jan 9, 2011
 *
 * LICENSE
 *
 * This source file is copyrighted by WDS, full details in LICENSE.txt.
 * It is also available through the Internet at this URL:
 * http://wds.vn/license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the Internet, please send an email
 * to license@wds.vn so we can send you a copy immediately.
 *
 */
 
 
define('START_TIME', microtime(true));

/**
 * Define path to Web Root
 * 
 * Định nghĩa đường dẫn tới webroot
 */
defined('WEB_ROOT')
    || define('WEB_ROOT', realpath(dirname(dirname(__FILE__))));
    
/**
 * Define path to Application directory
 * 
 * Định nghĩa đường dẫn tới thư mục application
 */     
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', WEB_ROOT . '/application');

/**
 * Define path to Application directory
 * 
 * Định nghĩa đường dẫn tới thư mục application
 */     
defined('MODULE_PATH')
    || define('MODULE_PATH', APPLICATION_PATH . '/modules');

/**
 * Define path to public_html directory
 * 
 * Định nghĩa đường dẫn tới thư mục public_html
 */
defined('PUBLIC_PATH')
    || define('PUBLIC_PATH', WEB_ROOT . '/public');
    

/**
 * Define environment of application
 * See config at application.ini
 * 
 * Định nghĩa môi trường của ứng dụng
 * Xem thiết lập tại file config application.ini
 * production - development - test
 */    
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                         : 'development')) ; //production
    
/**
 * Config file inc
 *
 * Caching file
 */
defined('CONFIG_INC')
    || define('CONFIG_INC',
              APPLICATION_PATH . '/configs/application.ini.inc');
                                         
                                         
                                         
                                         
                                         