<?php

/**
 * WDS GROUP
 *
 * @name        Associations.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Menu/Category
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

namespace WDS\Model\Entity\Menu\Category;

/**
 * @Entity 
 * @Table(name="menus_category_associations")
 */
class Associations {

    //`menu_content_association_id`, `menu_id`, `category_id`
    /**
     * @Id
     * @Column(name="`menu_content_association_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_menu_content_association_id;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Categories", inversedBy="_menus_category_associations")
     * @JoinColumn(name="category_id", referencedColumnName="category_id")     
     * category_id
     */
    private $_categories;    
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Menus", inversedBy="_menus_category_associations")
     * @JoinColumn(name="menu_id", referencedColumnName="menu_id")     
     * menu_id
     */
    private $_menus;
    
    public function getMenuContentAssociationId() {
        return $this->_menu_content_association_id;
    }
    /**
     *
     * @return \WDS\Model\Entity\Category
     */
    public function getCategories() {
        return $this->_categories;
    }

    public function setCategories($_category) {
        $this->_categories = $_category;
    }

    /**
     *
     * @return \WDS\Model\Entity\Menu
     */
    public function getMenus() {
        return $this->_menus;
    }

    public function setMenus($_menu) {
        $this->_menus = $_menu;
    }


    
}
