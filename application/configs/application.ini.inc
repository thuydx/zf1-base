[production]
;============================================================
; php.ini Configuration
;============================================================
; Any settings to initialize
;------------------------------------------------------------
phpSettings.date.timezone                = "Asia/Saigon"
phpSettings.display_startup_errors       = 0
phpSettings.display_errors               = 0
phpSettings.error_reporting              = 8191


;============================================================
; Library Configuration
;============================================================
; Any extra include_paths to set
;------------------------------------------------------------
includePaths.library                     = LIBRARY_PATH


;============================================================
; Namespaces Configuration
;============================================================
; Any additional autoloader namespaces to register
;------------------------------------------------------------ 
autoloadernamespaces.WDS                = "WDS"
autoloadernamespaces.resources.doctrine           = "resources.doctrine"
autoloadernamespaces.Entity             = "Entity"
autoloadernamespaces.Zend               = "Zend"
autoloadernamespaces.ZendX              = "ZendX"
autoloadernamespaces.Symfony            = "Symfony"


;============================================================
; Bootstrap Configuration
;============================================================
; Options for bootstrapping
;------------------------------------------------------------ 
bootstrap.path                          = APPLICATION_PATH "/Bootstrap.php"
bootstrap.class                         = "Bootstrap"


;============================================================
; Custom Resource Configuration
;============================================================
; Additional Resource prefix/path pairs to use
;------------------------------------------------------------
pluginPaths.WDS_Application_Resource    = LIBRARY_PATH "/WDS/Application/Resource/"


;============================================================
; Components Configuration
;============================================================
; All components have directory at WEB_ROOT/application/backend
;------------------------------------------------------------ 
resources.components.admincp.directory 	=  "/admincp"
resources.components.usercp.directory 	=  "/usercp"


;============================================================
; Modules Configuration
;============================================================
; Autoload modules
;------------------------------------------------------------ 
resources.modules[] =


;============================================================
; FrontController Configuration
;============================================================
; Initiation Front controller for application
; Setup frontend's modules
;------------------------------------------------------------ 
resources.frontController.moduleDirectory                       = APPLICATION_PATH "/frontend"
resources.frontController.moduleControllerDirectoryName         = "controllers"
resources.frontController.defaultModule                         = "front"
resources.frontController.defaultControllerName					= "index"
resources.frontController.defaultAction							= "index"
resources.frontController.plugins.layoutsetup	                = "WDS_Controller_Plugin_Layoutsetup"                               
resources.frontController.noErrorHandler                        = 0
resources.frontController.throwExceptions                       = 0
resources.frontController.params.displayExceptions 				= 0
resources.frontController.params.prefixDefaultModule 			= 0


;============================================================
; Layout Configuration
;============================================================
; Setup your layout in mudule config
; Setup your path to layout in mudule config
;------------------------------------------------------------ 
resources.layout.layout                              			= "Setup your layout in mudule config"
resources.layout.layoutPath 						 			= "Setup your path to layout in mudule config"


;============================================================
; Views Configuration
;============================================================
; Default view setting
;------------------------------------------------------------ 
resources.view.title                                            = ""
resources.view.encoding                                         = "UTF-8"
resources.view.helperPathPrefix                                 = "WDS_View_Helper_"
resources.view.helperPath                                       = "WDS/View/Helper/"
resources.view.params.doctype                                   = "XHTML1_STRICT"
resources.view.params.charset                                   = "utf-8"
;resources.view.viewSuffix                                      = "html"
resources.view.pathScript										= "/scripts/"

;============================================================
; Database Configuration
;============================================================
; We'll be use resources.doctrine ORM and DBAL
;------------------------------------------------------------ 
;resources.db.adapter                                            = "pdo_mysql"
;resources.db.params.host                                        = "127.0.0.1"
;resources.db.params.username                                    = "root"
;resources.db.params.password                                    = "admin@1234"
;resources.db.params.dbname                                      = "wdscms"
;resources.db.isDefaultTableAdapter                              = true
;resources.db.params.driver_options.1002                         = "SET NAMES UTF8;"
;resources.db.profiler.class   									 = "WDS_Db_Profiler"
;resources.db.profiler.enabled 									 = true


;============================================================
; Doctrine Configuration
;============================================================
; Doctrine cache
;------------------------------------------------------------
resources.doctrine.cache.defaultCacheInstance = default
resources.doctrine.cache.instances.default.adapterClass 				= "Doctrine\Common\Cache\ArrayCache"
resources.doctrine.cache.instances.default.namespace 					= "WDS_"
;------------------------------------------------------------
; Doctrine DBAL
;------------------------------------------------------------
resources.doctrine.dbal.defaultConnection	= default
resources.doctrine.dbal.connections.default.parameters.driver			= pdo_mysql
resources.doctrine.dbal.connections.default.parameters.dbname			= db_test
resources.doctrine.dbal.connections.default.parameters.host				= localhost
resources.doctrine.dbal.connections.default.parameters.port				= 3306
resources.doctrine.dbal.connections.default.parameters.user				= root
resources.doctrine.dbal.connections.default.parameters.password			= 
;------------------------------------------------------------
; Doctrine ORM
;------------------------------------------------------------
resources.doctrine.orm.defaultEntityManager												= "default"
resources.doctrine.orm.entityManagers.default.connection								= "default"
resources.doctrine.orm.entityManagers.default.proxy.autoGenerateClasses					= true
resources.doctrine.orm.entityManagers.default.proxy.namespace							= "WDS\Model\Entity\Proxy"
resources.doctrine.orm.entityManagers.default.proxy.dir									= LIBRARY_PATH "/WDS/Model/Entity/Proxy"
resources.doctrine.orm.entityManagers.default.metadataDrivers.0.adapterClass			= "Doctrine\ORM\Mapping\Driver\AnnotationDriver"
resources.doctrine.orm.entityManagers.default.metadataDrivers.0.mappingNamespace		= "Entity"
resources.doctrine.orm.entityManagers.default.metadataDrivers.0.mappingDirs				= LIBRARY_PATH "/WDS/Model/Entity"
resources.doctrine.orm.entityManagers.default.metadataDrivers.0.annotationReaderClass	= "Doctrine\Common\Annotations\AnnotationReader"
resources.doctrine.orm.entityManagers.default.metadataDrivers.0.annotationReaderCache	= "default"

;============================================================
; Location Configuration
;============================================================
; locale
;------------------------------------------------------------       
resources.locale                             					= true
;------------------------------------------------------------
; translate
;------------------------------------------------------------ 
;resources.translate.registry_key                                = "Zend_Translate"
;resources.translate.adapter                                     = "array"
;resources.translate.options.scan                                = "directory"
;resources.translate.data.directory		                        = APPLICATION_PATH "/languages/"
;resources.translate.data.fileExt                                = ".php"
;resources.translate.options.disableNotices  				    = true 
;resources.translate.options.logUntranslated 					= true


;============================================================
; Session Configuration
;============================================================
; 
;------------------------------------------------------------ 
resources.session.save_path                                     = WEB_ROOT "/data/sessions/"
resources.session.use_only_cookies                              = 1
resources.session.remember_me_seconds                           = 172800

;============================================================
; Logs Configuration
;============================================================
; We'll use default logs with ErrorController
;------------------------------------------------------------ 
;resources.log													= true
;resources.log.stream.writerName								= "Stream"
;resources.log.stream.writerParams.stream						= WEB_ROOT . '/data/logs/%d.log'  ;%d se duoc thay bang date('d-m-Y')
;resources.log.stream.writerParams.mode 						= "a"
;resources.log.stream.filterName 								= "Priority"
;resources.log.stream.filterParams.priority 					= 4


;============================================================
; Mails Configuration
;============================================================
; 
;------------------------------------------------------------
;resources.mail								= true
;resources.mail.transport.type 				= smtp
;resources.mail.transport.host 				= "smtp.example.com"
;resources.mail.transport.auth 				= login
;resources.mail.transport.username 			= myUsername
;resources.mail.transport.password 			= myPassword
;resources.mail.transport.register 			= true ; True by default

;resources.mail.defaultFrom.email 			= master@wds.vn
;resources.mail.defaultFrom.name 			= "Thuy Dinh Xuan"
;resources.mail.defaultReplyTo.email 		= someone@example.com
;resources.mail.defaultReplyTo.name 		= "name"

[staging : production]

[testing : production]
phpSettings.display_startup_errors 	= 1
phpSettings.display_errors 			= 1

[development : production]
phpSettings.display_startup_errors 	= 1
phpSettings.display_errors 			= 1
resources.frontController.params.displayExceptions = 1
