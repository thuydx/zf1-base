<?php

/**
 * WDS GROUP
 *
 * @name        Locale.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 10:20:28 PM - 2011
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

namespace WDS\Model\Entity;

/**
 * @Entity 
 * @Table(name="locale")
 * @author Thuy Dinh Xuan <thuydx@wds.vn>
 *
 */
class Locale {

    /**
     * @id 
     * @column(name="locale_id", type="integer", length=11) 
     * @generatedvalue
     * primary key
     * @var _locale_id int
     */
    private $_locale_id;

    /**
     * @column(name="locale_name", type="string", length=255)
     * @var _locale_name string 
     */
    private $_locale_name;

    /**
     * @column(name="locale_code", type="string", length=255)
     * @var _locale_code string 
     */
    private $_locale_code;

    /**
     * @column(name="locale_default", type="string", length=255)
     * @var _locale_default string 
     */
    private $_locale_default;

    /**
     * @column(name="locale_status", type="boolean")
     * @var _locale_status boolean 
     */
    private $_locale_status;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Category\Detail", mappedBy="_locale")
     */
    private $_category_detail;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Content\Detail", mappedBy="_locale")
     */
    private $_content_detail;
    
    
    /**     
     * @return array \WDS\Model\Entity\Category\Detail
     */
    public function getCategoryDetail() {
        return $this->_category_detail;
    }

    public function setCategoryDetail($_category_detail) {
        $this->_category_detail = $_category_detail;
    }

        
    public function getLocaleId() {
        return $this->_locale_id;
    }

    public function getLocaleName() {
        return $this->_locale_name;
    }

    public function setLocaleName($_locale_name) {
        $this->_locale_name = $_locale_name;
    }

    public function getLocaleCode() {
        return $this->_locale_code;
    }

    public function setLocaleCode($_locale_code) {
        $this->_locale_code = $_locale_code;
    }

    public function getLocaleDefault() {
        return $this->_locale_default;
    }

    public function setLocaleDefault($_locale_default) {
        $this->_locale_default = $_locale_default;
    }

    public function getLocaleStatus() {
        return $this->_locale_status;
    }

    public function setLocaleStatus($_locale_status) {
        $this->_locale_status = $_locale_status;
    }

}