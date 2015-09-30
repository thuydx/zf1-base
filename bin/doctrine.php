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
        
/** Zend_Application */
require_once 'Zend/Application.php';
// Creating application
$application = new Zend_Application(APPLICATION_ENV, 
APPLICATION_PATH . '/configs/application.xml');
// Bootstrapping resources
$bootstrap = $application->bootstrap()->getBootstrap();
$bootstrap->bootstrap('Config')->bootstrap('Doctrine');
// Retrieve Doctrine Container resource
$container = $application->getBootstrap()->getResource('doctrine');
// Console
$cli = new \Symfony\Component\Console\Application(
'Doctrine Command Line Interface', \Doctrine\Common\Version::VERSION);
try {
    // Bootstrapping Console HelperSet
    $helperSet = array();
    if (($dbal = $container->getConnection(
    getenv('CONN') ?  : $container->defaultConnection)) !== null) {
        $helperSet['db'] = new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper(
        $dbal);
    }
    if (($em = $container->getEntityManager(
    getenv('EM') ?  : $container->defaultEntityManager)) !== null) {
        $helperSet['em'] = new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper(
        $em);
    }
} catch (\Exception $e) {
    $cli->renderException($e, 
    new \Symfony\Component\Console\Output\ConsoleOutput());
}
$cli->setCatchExceptions(true);
$cli->setHelperSet(new \Symfony\Component\Console\Helper\HelperSet($helperSet));
$cli->addCommands(
array(// DBAL Commands
new \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand(), 
new \Doctrine\DBAL\Tools\Console\Command\ImportCommand(), 
// ORM Commands
new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(), 
new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(), 
new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(), 
new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(), 
new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(), 
new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(), 
new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(), 
new \Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand(), 
new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(), 
new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(), 
new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(), 
new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(), 
new \Doctrine\ORM\Tools\Console\Command\RunDqlCommand()));
$cli->run();
