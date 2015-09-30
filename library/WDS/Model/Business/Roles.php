<?php
/**
 * WDS GROUP
 *
 * @name        Roles.php
 * @category    WDS
 * @package        
 * @subpackage           
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 9:53:03 PM - 2011
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
namespace WDS\Model\Business;


use Doctrine\ORM\Mapping\OrderBy;
use Doctrine\ORM\Query\ResultSetMapping;
use WDS\Model\Entity;

class Roles {

    protected $_em;
    
    public function __construct(){
        if (\Zend_Registry::isRegistered('em')) {
            return $this->_em = \Zend_Registry::get('em');
        }
    }
	public function getPartName($name = 'module'){
	    
        //$query = $this->_em->createQueryBuilder();
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('\WDS\Model\Entity\Roles', 'r');
        $rsm->addFieldResult('r', $name, $name);
        $query = $this->_em->createNativeQuery('SELECT '.$name.' FROM Roles GROUP BY '.$name,$rsm);
//        $query  ->select('r._'.$name)
//                ->from('WDS\Model\Entity\Roles', 'r')
//                ->groupBy('r._'.$name);
        //$objResults = $query->getQuery()->getResult();
echo '<pre>';
var_dump($query->getResult());
echo '</pre>'; die();
        $results = array();
        
        
        
        foreach ($objResults as $roleObj) {
            //$results[] = $roleObj->$$fun;
        }          
		return $results;	
	}
	
	public function getNameResource(){
        $query = $this->_em->createQueryBuilder()
        ->select('r')
            ->from('\WDS\Model\Entity\Roles','r')
            ->orderBy('r._role_id','DESC');
        $objResults = $query->getQuery()->getResult();
        $results = array();  
        foreach ($objResults as $roleObj) {
            $results[] = array(
            				'role_id' => $roleObj->getRoleId(),
            				'role_title' => $roleObj->getRoleTitle(),
            				'role_description' => $roleObj->getRoleDescription(),
            				'module' => $roleObj->getModule(),
            				'controller' => $roleObj->getController(),
            				'action' => $roleObj->getAction()
                        );
        }          
        
		return $results;
	}
	
	public function getControllerByModule($module){
        $query = $this->_em->createQueryBuilder()
                ->select('r')
                ->from('WDS\Model\Entity\Roles', 'r')
                ->where('r._module = ?1')
                ->setParameter(1, $module);
        $results = $query->getQuery()->getResult();       
		return $results[0]->getController();
	}
	
	public function getActionByController($controller){
        $query = $this->_em->createQueryBuilder()
                ->select('r')
                ->from('WDS\Model\Entity\Roles', 'r')
                ->where('r._controller = ?1')
                ->setParameter(1, $controller);
        $results = $query->getQuery()->getResult();       
		return $results[0]->getAction();
	}
	
	public function getId($controller, $name){
        $query = $this->_em->createQueryBuilder();
        
        $query  ->select('r')
                ->from('WDS\Model\Entity\Roles', 'r')
                ->where($query->expr()->andX(
                       $query->expr()->eq('r._controller', '?1'),
                       $query->expr()->eq('r._role_title', '?2')))
                ->setParameter(1, $controller)
                ->setParameter(2, $name);
        $results = $query->getQuery()->getResult();  
		return $results[0]->getRoleId();	   
	}
	
	public function saveItem($data){
		return $this->insert($data);
	}
	
	public function deleteItem($arrParam, $options = null){
		switch ($arrParam['type']){
			case 'module':
				$moduleName = $arrParam['name'];
				
				$where = "module = '$moduleName'";
				$this->delete($where);
				return true;
				break;
			case 'controller':
				$arrName = explode('-', $arrParam['name']);
				$moduleName = $arrName[0];
				$controllerName = $arrName[1];
				
				$where = "module = '$moduleName' AND controller = '$controllerName'";
				$this->delete($where);
				return true;
				break;
			case 'action':
				$id = $arrParam['id'];
				
				$where = 'id = ' . $id;
				$this->delete($where); 
				return true;
				break;
			default:
		}
	}
} 