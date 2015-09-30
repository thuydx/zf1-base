<?php

/**
 * WDS GROUP
 *
 * @name        Category.php
 * @category    
 * @package     
 * @author        Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $ $
 * 9:42:21 PM - May 3, 2011
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
 
class Front_Model_Category extends WDS_Model_Doctrine 
{
    protected $_entity = 'Category';
    protected $_primary = 'id';

    /**
     * lấy toàn bộ dữ liệu trong bảng
     * @return array
     */
    public function getAllRecord($limit = null, $offset = null) {
        $sort = array(
            'weight'    =>  'ASC'
        );
        return $this->fetchAll(null,$sort,$limit, $offset);
    }          
    
    /**
     *
     * @return tong so ban ghi
     */
    public function getTotalRows() {
        return $this->getCountRows();
    }    
}