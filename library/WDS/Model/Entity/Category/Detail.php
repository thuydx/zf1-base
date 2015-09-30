<?php

/**
 * WDS GROUP
 *
 * @name        Detail.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Category
 * @author      Man Ha Anh <manha@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 1:36:28 PM - 2011
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

namespace WDS\Model\Entity\Category;

/**
 * @Entity
 * @Table(name="category_detail")
 */
class Detail {

    /**
     * @Id
     * @Column(name="`category_detail_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_category_detail_id;

    /**
     * @Column(name="`category_title`", type="string", length=255)
     * @var string
     */
    private $_category_title;

    /**
     * @Column(name="`category_description`", type="string", length=255)
     * @var string
     */
    private $_category_description;

    /**
     * @Column(name="`category_meta_title`", type="string", length=255)
     * @var string
     */
    private $_category_meta_title;

    /**
     * @Column(name="`category_meta_description`", type="string", length=255)
     * @var string
     */
    private $_category_meta_description;

    /**
     * @Column(name="`category_meta_keyword`", type="string", length=255)
     * @var string
     */
    private $_category_meta_keyword;

    /**
     * @Column(name="`general_url`", type="string", length=255)
     * @var string
     */
    private $_general_url;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Categories", inversedBy="_category_detail")
     * @JoinColumn(name="category_id", referencedColumnName="category_id")     
     * category_id
     */
    private $_categories;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Locale", inversedBy="_category_detail")
     * @JoinColumn(name="locale_id", referencedColumnName="locale_id")     
     * locale_id
     */
    private $_locale;
    
    public function getCategoryDetailId() {
        return $this->_category_detail_id;
    }

    public function setCategoryDetailId($_category_detail_id) {
        $this->_category_detail_id = $_category_detail_id;
    }

    public function getCategoryTitle() {
        return $this->_category_title;
    }

    public function setCategoryTitle($_category_title) {
        $this->_category_title = $_category_title;
    }

    public function getCategoryDescription() {
        return $this->_category_description;
    }

    public function setCategoryDescription($_category_description) {
        $this->_category_description = $_category_description;
    }

    public function getCategoryMetaTitle() {
        return $this->_category_meta_title;
    }

    public function setCategoryMetaTitle($_category_meta_title) {
        $this->_category_meta_title = $_category_meta_title;
    }

    public function getCategoryMetaDescription() {
        return $this->_category_meta_description;
    }

    public function setCategoryMetaDescription($_category_meta_description) {
        $this->_category_meta_description = $_category_meta_description;
    }

    public function getCategoryMetaKeyword() {
        return $this->_category_meta_keyword;
    }

    public function setCategoryMetaKeyword($_category_meta_keyword) {
        $this->_category_meta_keyword = $_category_meta_keyword;
    }

    public function getGeneralUrl() {
        return $this->_general_url;
    }

    public function setGeneralUrl($_general_url) {
        $this->_general_url = $_general_url;
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
     * @return \WDS\Model\Entity\Locale
     */
    public function getLocale() {
        return $this->_locale;
    }

    public function setLocale($_locale) {
        $this->_locale = $_locale;
    }



}
