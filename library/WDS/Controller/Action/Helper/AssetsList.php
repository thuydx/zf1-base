<?php
class WDS_Controller_Action_Helper_AssetsList extends Zend_Controller_Action_Helper_Abstract{
	
	public function getActionName($name){
		$result = explode('_', $name);
		return $result[1];
	}
	
	public function getList($options = null){
		$module_dir = $this->getFrontController()->getControllerDirectory();
		$resources = array();
		
		foreach ($module_dir as $dir => $dirpath) {
			$diritem = new DirectoryIterator($dirpath);
			foreach ($diritem as $item) {
				if ($item->isFile()) {
					if (strstr($item->getFilename(), 'Controller.php') != FALSE) {
						$classPath = $dirpath . '/' . $item->getFilename();
						include_once $classPath;
						$php_file = file_get_contents($classPath);
						$tokens = token_get_all($php_file);
						$class_token = false;
						foreach ($tokens as $token) {
							if (is_array($token)) {
								if ($token[0] == T_CLASS) {
									$class_token = true;
								} else if ($class_token && $token[0] == T_STRING) {
									$class = $token[1];
									if (is_subclass_of($class, 'Zend_Controller_Action')) {
										$functions = array();
										$c = strtolower(substr($class, 0, strpos($class, "Controller")));
										foreach (get_class_methods($class) as $method) {
											if (strstr($method, 'Action') != false) {
												$resources[$dir][$c][] = substr($method,0,strpos($method,"Action"));
											}
										}
									}
									$class_token = false;
								}
							}
						}
					}
				}
			}
		}
		
		return $resources;
	}
}