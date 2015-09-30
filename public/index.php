<?php
    define('START_TIME', microtime(true));
    
    /**
     * Php version checking
     * 
     * Kiểm tra phiên bản PHP
     * Nếu phiên bản trước 5.2.4 thì báo lỗi
     */
    if (true === version_compare(phpversion(), '5.3.3', '<')) {
        exit('Boot failure ! (102)');
    }
    
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
     * Define path to library directory
     * 
     * Định nghĩa đường dẫn tới thư mục library
     */     
    defined('LIBRARY_PATH')
        || define('LIBRARY_PATH', WEB_ROOT . '/library');
            
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
     * Setting up include_path
     * Make sure /library in include_path
     * 
     * Thiết lập đường dẫn cho include
     * Chắc chắn rằng thư viện Zend có trong include_path
     */
    set_include_path(implode(PATH_SEPARATOR,array(
        LIBRARY_PATH ,
        get_include_path(),
        )));
        
    
    /**
     * Config file inc
     *
     * Caching file
     */
    defined('CONFIG_INC')
        || define('CONFIG_INC',
                  APPLICATION_PATH . '/configs/application.xml.inc');
    
    /**
     * If no cache we use the default ini
     *
     */
    $configFile = CONFIG_INC;
    $noConfigCache = false;
    if (false == is_file(CONFIG_INC)) {
        //$configFile = APPLICATION_PATH . '/configs/application.xml';
        $configFile = APPLICATION_PATH . '/configs/application.ini';
        $noConfigCache = true;
    }
    
    /** Zend_Application */
    require_once 'Zend/Application.php';

    
    /**
     * Boot and run
     */
    $application = new Zend_Application(
        APPLICATION_ENV,
        $configFile
        );
       
    
    /**
     * If no config cache then we create it
     * Only for production
     * 
     * Nếu không có thiết lập cache thì chúng ta sẽ tạo thiết lập mới
     * Chỉ dùng cho phiên bản production
     */
    if ($noConfigCache and ('production' == APPLICATION_ENV)) {
        $configs = '<?php' . PHP_EOL
                 . 'return '
                 . var_export($application->getOptions(), true) . PHP_EOL
                 . '?>';
        file_put_contents(CONFIG_INC, $configs);
    } else {
        // Debug
        //echo 'The configs are cached';
    }
    
    umask(0);

    /**
     * Thiết lập không hiển thị lỗi nếu là phiên bản production
     *
     */
    if ('production' !== APPLICATION_ENV) {
        $application->getAutoloader()->suppressNotFoundWarnings(false);
    }

    $application->bootstrap()
                ->run();