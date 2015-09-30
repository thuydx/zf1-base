<?php

/**
 * WDS GROUP
 *
 * @name        Business.php
 * @category    Model
 * @package     WDS/Model/
 * @subpackage  
 * @author      Man Ha Anh <manha@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 1:53:11 PM - 2011
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

namespace WDS\Model;
use \Zend_Registry;
abstract class Business {
    
    /**     
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_em = null;

    function __construct() {
        $this->_em = \Zend_Registry::get('em');
    }

    
    /**
     * get count rows
     * @param Doctrine\ORM\Query $query
     * @return int
     */
    public function getCountRow(\Doctrine\ORM\Query $query)
    {                
        $countQuery = clone $query;
        $countQuery instanceof Doctrine\ORM\Query;                
        $countQuery->setHint(\Doctrine\ORM\Query::HINT_CUSTOM_TREE_WALKERS, array('WDS_DoctrineExtensions_Paginate_CountSqlWalker'));        
        if ($query->getParameters() != null)
        {
            foreach ($query->getParameters() as $key => $value) {
                $countQuery->setParameter($key, $value);
            }
        }        
        $countQuery->setFirstResult(null)->setMaxResults(null);        
        return (int)$countQuery->getSingleScalarResult();
    }
    
}
