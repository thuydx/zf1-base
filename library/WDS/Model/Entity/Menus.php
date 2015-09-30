<?php

/**
 * WDS GROUP
 *
 * @name        Menus.php
 * @category    Entity
 * @package     WDS/Model/Entity
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

namespace WDS\Model\Entity;

/**
 * @Entity 
 * @Table(name="menus")
 */
class Menus {

    //`menu_id`, `menu_name`, `menu_type`, `menu_link`, `menu_target`, `lft`, `rgt`
    /**
     * @Id
     * @Column(name="`menu_id `", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_menu_id;

    /**
     * @Column(name="`menu_name`", type="string", length=45)
     * @var string
     */
    private $_menu_name;

    /**
     * @Column(name="`menu_type`", type="string", length=255)
     * @var string
     */
    private $_menu_type;

    /**
     * @Column(name="`menu_link`", type="string", length=255)
     * @var string
     */
    private $_menu_link;

    /**
     * @Column(name="`menu_target`", type="string", length=255)
     * @var string
     */
    private $_menu_target;

    /**
     * @Column(name="`lft`", type="integer", length=11)
     * @var int
     */
    private $_lft;

    /**
     * @Column(name="`rgt`", type="integer", length=11)
     * @var int
     */
    private $_rgt;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Menu\Category\Associations", mappedBy="_menus")
     */
    private $_menus_category_associations;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Menu\Content\Associations", mappedBy="_menus")
     */
    private $_menus_content_associations;
    
    public function getMenuId() {
        return $this->_menu_id;
    }

    public function getMenuName() {
        return $this->_menu_name;
    }

    public function setMenuName($_menu_name) {
        $this->_menu_name = $_menu_name;
    }

    public function getMenuType() {
        return $this->_menu_type;
    }

    public function setMenuType($_menu_type) {
        $this->_menu_type = $_menu_type;
    }

    public function getMenuLink() {
        return $this->_menu_link;
    }

    public function setMenuLink($_menu_link) {
        $this->_menu_link = $_menu_link;
    }

    public function getMenuTarget() {
        return $this->_menu_target;
    }

    public function setMenuTarget($_menu_target) {
        $this->_menu_target = $_menu_target;
    }

    public function getLft() {
        return $this->_lft;
    }

    public function setLft($_lft) {
        $this->_lft = $_lft;
    }

    public function getRgt() {
        return $this->_rgt;
    }

    public function setRgt($_rgt) {
        $this->_rgt = $_rgt;
    }

    public function getMenusCategoryAssociations() {
        return $this->_menus_category_associations;
    }

    public function setMenusCategoryAssociations($_menus_category_associations) {
        $this->_menus_category_associations = $_menus_category_associations;
    }

    public function getMenusContentAssociations() {
        return $this->_menus_content_associations;
    }

    public function setMenusContentAssociations($_menus_content_associations) {
        $this->_menus_content_associations = $_menus_content_associations;
    }


    
}
