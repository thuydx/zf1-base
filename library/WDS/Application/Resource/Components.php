<?php
/**
 * WDS GROUP
 *
 * @name        Components.php
 * @category    WDS
 * @package     WDS/Application/Resource
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $2.0$
 * 9:32:33 PM - May 5, 2011
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
 
/**
 * Components bootstrap resource
 * 
 * Supports groups of components as per the following
 * examples (in these examples we assume the components
 * folder is called 'admincp').
 * 
 * www.domain.com/en/admincp/
 * -> Module name: admincp
 * -> Language name: en (English)
 * -> Namespace: Admincp
 * -> Module folder: application/components/admincp/default/
 * -> Controller namespace: Admincp_IndexController
 * -> Resource namespace: Admincp_Model_Name     
 * 
 * www.domain.com/en/admincp/user/
 * -> Module name: admincpUser
 * -> Language name: en (English) 
 * -> Namespace: Admincp
 * -> Module folder: application/components/admincp/user/
 * -> Controller namespace: AdmincpUser_IndexController
 * -> Resource namespace: AdmincpUser_Model_Name
 * 
 * The default routing supports ID as a third parameter, i.e.
 * 
 * www.domain.com/admin/user/groups/view/5
 * -> Module name: admincpUser
 * -> Language name: en (English)
 * -> Controller class: AdmincpUser_GroupsController
 * -> Controller file: application/components/admincp/user/controllers/GroupsController.php
 * -> Action: viewAction()
 * -> ID: 5
 * 
 * Enable in application.ini by setting the component name and module dir path
 * resources.components.component-name.directory = APPLICATION_PATH /components/path-to-component-name
 * 
 * Real-world examples would be:
 * resources.components.admincp.directory = APPLICATION_PATH "/components/admincp"
 * resources.components.cms.directory = APPLICATION_PATH "/components/cms"
 * 
 * This basically sets up the controller directory, routing and an 
 * autoloader for module resources
 * @link http://framework.zend.com/manual/en/zend.loader.autoloader-resource.html
 * 
 * You can disable automatic reation of routing with:
 * resources.components.cms.route = false
 * 
 * Please note you cannot have a normal ZF module or controller with the 
 * same name as the components URL. For example, if the components folder name
 * is 'admin' then the following module or controller cannot exist in your
 * application:
 * 
 * application/controllers/AdminController.php
 * application/modules/admin/
 */
class WDS_Application_Resource_Components 
	extends \Zend_Application_Resource_ResourceAbstract {
    
	/**
	 * The URL used to serve the components
	 * 
	 * @var $_componentsUrl string
	 */
	protected $_componentsUrl;
	
    /**
     * The absolute path of the module directory where component are stored
     * 
     * @var string
     */
    protected $_componentsDir;
    
    /**
     * List of admin modules
     * 
     * @var array
     */
    protected $_moduleList = array();
    
    /**
     * Initialize components
     * 
     * Defined by Zend_Application_Resource_Resource
     * 
     * @return void
     * @throws Zend_Application_Resource_Exception
     */
    public function init()
    { 
    	// Dependency tracking
        $bootstrap = $this->getBootstrap();
        // Checking boostrap is instance of Zend Bootstrap
        if (!($bootstrap instanceof Zend_Application_Bootstrap_Bootstrap)) {
            throw new \Zend_Application_Exception('Invalid bootstrap class');
        }  
              
        $bootstrap->bootstrap('FrontController');
        $front = $bootstrap->getResource('FrontController');
     
        // Set options
        $options = $this->getOptions();

        // Setup router for modules    
        // Get localeCode (for language router)
        $bisObj = new WDS\Model\Business\Locale();
        $bisObj->initLocale();
        $localeObjects = $bisObj->getAll();
        foreach ($localeObjects['data'] as $data) {
            $localeCode = $data->getLocaleCode();
            $languages[] = substr($localeCode, 0,2);
        }
        $language = implode("|", $languages);
        
        // create language router
        $languageRouterUrlFormat = ':language';
        $languageRoute = new \Zend_Controller_Router_Route(
                    $languageRouterUrlFormat, 
                        array ( 'language' => 'en'),
                        array ( 'language'		=> '^('.$language.')$')
                        );

        $moduleRouter = new Zend_Controller_Router_Route_Module(
                        array(
                            'module' => 'default',
                            'controller' => 'index',
                            'action' => 'index'
                        ),
                        $front->getDispatcher(),
                        $front->getRequest()
        );

        $moduleRouter->isAbstract(true);

        $default = new Zend_Controller_Router_Route_Chain();

        $default->chain($languageRoute);
        $default->chain($moduleRouter);

        $router = $front->getRouter();
        $router->addRoute('language', $languageRoute);
        $router->addRoute('default', $default);   

        
        // Loop through resources.components.interface = /path/to/components/interface
        foreach ($options as $componentFolder => $components) {
            // Loop through .name.modules_dir = /path/to/module
            foreach ($components as $name => $values) {
                if (!isset($values['directory'])) {
                	throw new \Zend_Application_Resource_Exception(
                    	"You must configure resources.components.[frontend/backend].name.directory to use
                    	components"
                    );
                }
                
                $enableRoute = true;
            	if (isset($values['route'])) {
            		$enableRoute = (bool) $values['route'];
            	}
                
                $this->_componentsUrl = $name;
                if ($componentFolder === "backend") {
                    $this->_componentsDir = APPLICATION_PATH . '/backend' . $values['directory'];
                }
                if ($componentFolder === "frontend") {
                    if ($name !== "front") {
                        $this->_componentsDir = APPLICATION_PATH . '/frontend' . $values['directory'];
                    } else {
                        throw new \Zend_Application_Resource_Exception(
                        	"You cant configure resources.components.frontend.front.directory to use
                        	components. Because this component is default for system"
                        );
                    }    
                }  
                
                // Check there isn't a normal module with the same module-url name
            	$modules = $front->getControllerDirectory();
    	        if (array_key_exists($name, $modules)) {
    	            throw new \Zend_Application_Resource_Exception(
    	            	"Cannot set up components at " . $this->_componentsDir .
    	                " since you have a normal $name module at " . $modules[$name]
    	            );
    	        }  
    	        
            	// Check there isn't a normal controller with the same module-url name
    	        $controllerName = ucfirst($name) . 'Controller';
    	        $controllerPath = $controllerName . '.php';
    	        if (file_exists($controllerPath)) {
    	        	throw new \Zend_Application_Resource_Exception(
    	            	"Cannot set up components at " . $this->_componentsDir .
    	                " since you have a normal $controllerName controller at " . $controllerPath
    	            );
    	        }   
    	        
            	// Register all modules in the component directory
    	        try {
    	            $dir = new DirectoryIterator($this->_componentsDir);
    	        } catch (Exception $e) {
    	            throw new Zend_Application_Resource_Exception(
    	            	'component directory ' . $this->_componentsDir . ' not readable'
    	            );
    	        } 
    	        
            	/**
    	         * First setup default module if it exists
    	         * 
    	         * This is important to ensure that the default module
    	         * has its routing setup before other modules
    	         */
    	        $defaultModule = $this->_componentsDir . '/default'; 
    	        if (is_dir($defaultModule)) {
    	       		$this->_setupModule('default', $defaultModule, $front, $enableRoute);
    	        }
    	        
    	        foreach ($dir as $file) {
    	        	// Ignore non-folders, the default and SCCS folders
    	            if ($file->isDot() || 
    	            	!$file->isDir() || 
    	            	($file->getFilename() == 'default') ||
    	            	preg_match('/^[^a-z]/i', $file->getFilename()) ||
    	            	'CVS' == $file->getFilename() || 
    	            	'SVN' == $file->getFilename()
    	            ) {
    	                continue;
    	            }
            		
    				// Setup other modules
    	            $this->_setupModule($file->getFilename(), $file->getPathname(), $front, $enableRoute);
    	        }
    	        
            }
        }       
        
        $module = $front->getControllerDirectory();

        // Setup config for modules
        $this->_setConfigModules($front);

        // Set autoload for module
        $this->_setAutoloadModule($front);
        
        return $this;
    }
    
    
	/**
	 * Setup module
	 * 
	 * @param string $folderName Folder name (should be lower-case camel caps)
	 * @param string $moduleDirectory Path to module directory
	 */    
    protected function _setupModule ($folderName, $moduleDirectory, Zend_Controller_Front $front, $enableRoute = true)
    {
        if ($folderName == 'default') {
            $moduleName = $this->_componentsUrl;     
        } else {
            $moduleName = $this->_componentsUrl . ucfirst($folderName);
        }
        $baseDir =  $moduleDirectory;
        $controllerDir = $baseDir . '/' . $front->getModuleControllerDirectoryName();
            
        // Register controllers
        $front->addControllerDirectory($controllerDir, $moduleName);

        // Register routing
        if ($enableRoute) {
            // Get localeCode
            $bisObj = new WDS\Model\Business\Locale();
            $bisObj->initLocale();
            $localeObjects = $bisObj->getAll();
            foreach ($localeObjects['data'] as $data) {
                $localeCode = $data->getLocaleCode();
                $languages[] = substr($localeCode, 0,2);
            }
            $language = implode("|", $languages);
            
            // create language router
            $languageRouterUrlFormat = ':language';
            $languageRoute = new \Zend_Controller_Router_Route(
                        $languageRouterUrlFormat, 
                            array ( 'language' => 'en'),
                            array ( 'language'		=> '^('.$language.')$')
                            );
        	if ($folderName == 'default') {
                // URL format: http://domain.com/component/
                $urlFormat = $this->_componentsUrl . '/:controller/:action';
            } else {
                // URL format: http://domain.com/component/module/
                $urlFormat = $this->_componentsUrl . '/' . 
                			 $this->_formatUrlString($folderName) . "/:controller/:action";
            }
            $route = new \Zend_Controller_Router_Route(
                        $urlFormat . '/*', 
                            array (
                            		'module'        => $moduleName,
                                    'controller'    => 'index', 
                                    'action'        => 'index')
                            );
            $router = $front->getRouter();
            $router->addRoute($moduleName, $route);
            $routeComponent = $languageRoute->chain($route);
            $router->addRoute('language', $languageRoute);
            $router->addRoute('com_module_'.$moduleName , $routeComponent);
            unset($route);
        }
        
        $this->_moduleList[$moduleName] = $baseDir;
    }
    
    
    /**
     * Return module list
     * 
     * @return array List of components (key = module, value = module path)
     */
    public function getModuleList ()
    {
        return $this->_moduleList;
    }
    
    /**
     * Convert camel caps string to a URL string
     * 
     * Examples:
     * DirectoryName = directory-name
     * directoryName = directory-name
     *
     * @param string $string
     */
    protected function _formatUrlString ($string)
    {
        // Lower-case first character
        $string = strtolower(substr($string, 0, 1)) . substr($string, 1, strlen($string) - 1);
        
        // Convert camel-case string to URL friendly string
        $string = preg_replace('/([A-Z]{1})/', '-$1', $string);
        $string = strtolower($string);
        
        // Remove any erroneous characters
        $string = preg_replace('/[^a-z0-9\-]/', '', $string);
        
        return $string;
    }

    /**
     * Setup Configuration Modules
     * Get module.ini from module/configs
     * Load config and merger to system configuration (application.ini)
     * @param Zend_Controller_Front $front
     */
    protected function _setConfigModules (Zend_Controller_Front $front) 
    {
        // Get list modules
        $modules = $front->getControllerDirectory();
        // Setup path to config files per each module
        foreach (array_keys($modules) as $module) {
            $configPath  = $front->getModuleDirectory($module) 
                         . DIRECTORY_SEPARATOR . 'configs';
            if (file_exists($configPath)) {
                $cfgdir = new DirectoryIterator($configPath);
                $appOptions = $this->getBootstrap()->getOptions();          
                foreach ($cfgdir as $file) {
                    if ($file->isFile()) {
                        $filename = $file->getFilename();
                        // Load file config
                        $options = $this->_loadOptions($configPath 
                                 . DIRECTORY_SEPARATOR . $filename);
                        if (($len = strpos($filename, '.')) !== false) {
                            $cfgtype = substr($filename, 0, $len);
                        } else {
                            $cfgtype = $filename;
                        }
 
                        if (strtolower($cfgtype) == 'module') {
                            if (array_key_exists($module, $appOptions)) {
                                if (is_array($appOptions[$module])) {
                                    $appOptions[$module] =
                                        array_merge($appOptions[$module], $options);
                                } else {
                                    $appOptions[$module] = $options;
                                }
                            } else {
                                $appOptions[$module] = $options;
                            }
                        } else {
                            $appOptions[$module]['resources'][$cfgtype] = $options;
                        }
                    }
                }
                $this->getBootstrap()->setOptions($appOptions);

            } else {
                continue;
            }
        }           
    }     
    
    /**
     * Load Options from Config file
     * @param unknown_type $fullpath
     * @throws Zend_Config_Exception
     * @throws Zend_Application_Resource_Exception
     */
    protected function _loadOptions($fullpath)
    {
        if (file_exists($fullpath)) {
            switch(substr(trim(strtolower($fullpath)), -3))
            {
                case 'ini':
                    $cfg = new Zend_Config_Ini($fullpath, $this->getBootstrap()
                                                    ->getEnvironment());
                    break;
                case 'xml':
                    $cfg = new Zend_Config_Xml($fullpath, $this->getBootstrap()
                                                    ->getEnvironment());
                    break;
                default:
                    throw new Zend_Config_Exception('Invalid format for config file');
                    break;
            }
        } else {
            throw new Zend_Application_Resource_Exception('File does not exist');
        }
        return $cfg->toArray();
    }

    /**
     * Setup Autoload per each module
     * @param Zend_Controller_Front $front
     */
	protected function _setAutoloadModule(Zend_Controller_Front $front)
	{
		/***
		 * Check moduleName was existed in Module List
		 */
		$controllerDirs = $front->getControllerDirectory();
		foreach ($controllerDirs as $moduleName => $controllerDir)
		{
			$moduleDirectory = str_replace($front->getModuleControllerDirectoryName(),'',$controllerDir);
			// Autoloader
	        $autoloader = new Zend_Application_Module_Autoloader(array(
				'basePath'  => $moduleDirectory,
				'namespace' => ucfirst($moduleName),      
	        ));
	        $autoloader->addResourceTypes(array(
            			'ultil' => array(
                'namespace' => 'Util',
                'path'      => 'utils',
            )));
		}
	}
	
}