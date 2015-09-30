<?php

/**
 * WDS GROUP
 *
 * @name        Doctrine.php
 * @category    
 * @package     
 * @author        Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $ $
 * 10:44:24 PM - May 5, 2011
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

use WDS\Model\Entity\Category;

class Doctrine {
     
     /**
      *       
      * @var \Doctrine\ORM\EntityManager
      */
     private $em;
     
     public function __construct() {
         $this->em = \Zend_Registry::get('em');
     }
 }