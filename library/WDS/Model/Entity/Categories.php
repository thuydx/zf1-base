<?php

/**
 * WDS GROUP
 *
 * @name        Categories.php
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
 * @Table(name="categories")
 */
class Categories {

    /**
     * @Id
     * @Column(name="`category_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_category_id;

    /**
     * @Column(name="`category_visit`", type="integer", length=11)
     * @var int
     */
    private $_category_visit;

    /**
     * @Column(name="`category_icon`", type="string", length=45)
     * @var string
     */
    private $_category_icon;

    /**
     * @Column(name="`category_password`", type="string", length=45)
     * @var string
     */
    private $_category_password;

    /**
     * @Column(name="`content_count`", type="integer", length=11)
     * @var int
     */
    private $_content_count;

    /**
     * @Column(name="`hide_form_menu`", type="smallint", length=4)
     * @var int
     */
    private $_hide_form_menu;

    /**
     * @Column(name="`sort_order`", type="integer", length=11)
     * @var int
     */
    private $_sort_order;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Category\Detail", mappedBy="_categories")
     */
    private $_category_detail;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Category\Associations", mappedBy="_categories")
     */
    private $_category_associations;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Menu\Category\Associations", mappedBy="_categories")
     */
    private $_menus_category_associations;

    public function getCategoryId() {
        return $this->_category_id;
    }

    public function setCategoryId($_category_id) {
        $this->_category_id = $_category_id;
    }

    public function getCategoryVisit() {
        return $this->_category_visit;
    }

    public function setCategoryVisit($_category_visit) {
        $this->_category_visit = $_category_visit;
    }

    public function getCategoryIcon() {
        return $this->_category_icon;
    }

    public function setCategoryIcon($_category_icon) {
        $this->_category_icon = $_category_icon;
    }

    public function getCategoryPassword() {
        return $this->_category_password;
    }

    public function setCategoryPassword($_category_password) {
        $this->_category_password = $_category_password;
    }

    public function getContentCount() {
        return $this->_content_count;
    }

    public function setContentCount($_content_count) {
        $this->_content_count = $_content_count;
    }

    public function getHideFormMenu() {
        return $this->_hide_form_menu;
    }

    public function setHideFormMenu($_hide_form_menu) {
        $this->_hide_form_menu = $_hide_form_menu;
    }

    public function getSortOrder() {
        return $this->_sort_order;
    }

    public function setSortOrder($_sort_order) {
        $this->_sort_order = $_sort_order;
    }

    public function getCategoryDetail() {
        return $this->_category_detail;
    }

    public function setCategoryDetail($_category_detail) {
        $this->_category_detail = $_category_detail;
    }

    public function getCategoryAssociations() {
        return $this->_category_associations;
    }

    public function setCategoryAssociations($_category_associations) {
        $this->_category_associations = $_category_associations;
    }
        
    public function getMenusCategoryAssociations() {
        return $this->_menus_category_associations;
    }

    public function setMenusCategoryAssociations($_menus_category_associations) {
        $this->_menus_category_associations = $_menus_category_associations;
    }

}
