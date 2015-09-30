<?php
/**
 * WDS GROUP
 *
 * @name        Categories.php
 * @category    WDS
 * @package     WDS/Model
 * @subpackage  Business
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 10:49:45 PM - 2011
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
//use \WDS\Model\Entity\Categories;
class Categories {
    
    private $_em = null;
    
    public function __construct() 
    {
        $this->_em = \Zend_Registry::get('em');        
    }
    
    public function insertDataAction($values = array()) {
        $cat = new \WDS\Model\Entity\Categories();
        foreach ($values as $key => $value) {
            $cat->$key = $value;
            $this->_em->persist($cat);                
        }
        //$this->_em->flush();
        //echo 'insert data successful!';
    }
        
    public function updateDataAction($values = array(),$id) {
        foreach ($values as $key => $value) {
            $set .= "'cat." . $key ."'=>':" . $value . "',";
            $params .= "'". $key . "'=>'" . $value. "',";
        }

        $query = $this->_em->createQueryBuilder()
            ->update('WDS\Model\Entity\Categories','cat')
            ->set($set)
            ->where('cat.category_id = :catid')
            ->setParameter($params)
            ->setParameter('catid', $id);
        $dql = $query->getQuery();            
        $result = $dql->execute();
        // echo $result . ' ban ghi bi thay doi';
        
    }
    
    public function deleteDataAction($id) {
        
        $query = $this->_em->createQueryBuilder()
            ->delete('WDS\Model\Entity\Category','cat')
            ->where('cat.id = ?1')
            ->setParameter(1, $id);
        $dql = $query->getQuery();            
        $result = $dql->execute();
        // echo $result . ' ban ghi bi xoa';
        
    }
    public function listDataAction() {
        //$value = 'new category';
        $query = $this->_em->createQueryBuilder()
        ->select('cat')
            ->from('\WDS\Model\Entity\Category','cat')
            ->orderBy('cat.id','DESC');
        $dql = $query->getQuery();            
        $result = $dql->getResult();
        return $result;
    }
}