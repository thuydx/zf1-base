<?php

/**
 * WDS GROUP
 *
 * @name        Detail.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Content
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

namespace WDS\Model\Entity\Content;

/**
 * @Entity
 * @Table(name="content_detail")
 */
class Detail {

    /**
     * @Id
     * @Column(name="`content_detail_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_content_detail_id;

    /**
     * @Column(name="`title`", type="string", length=125)
     * @var string
     */
    private $_title;

    /**
     * @Column(name="`alias`", type="string", length=125)
     * @var string
     */
    private $_alias;

    /**
     * @Column(name="`summary`", type="string", length=255)
     * @var string
     */
    private $_summary;

    /**
     * @Column(name="`content`", type="string", length=255)
     * @var string
     */
    private $_content;

    /**
     * @Column(name="`meta_title`", type="string", length=255)
     * @var string
     */
    private $_meta_title;

    /**
     * @Column(name="`meta_keyword`", type="string", length=255)
     * @var string
     */
    private $_meta_keyword;

    /**
     * @Column(name="`meta_description`", type="string", length=255)
     * @var string
     */
    private $_meta_description;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Locale", inversedBy="_content_detail")
     * @JoinColumn(name="locale_id", referencedColumnName="locale_id")     
     * locale_id
     */
    private $_locale;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_content_detail")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     * content_id
     */
    private $_contents;
    
    public function getContentDetailId() {
        return $this->_content_detail_id;
    }

    public function setContentDetailId($_content_detail_id) {
        $this->_content_detail_id = $_content_detail_id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function setTitle($_title) {
        $this->_title = $_title;
    }

    public function getAlias() {
        return $this->_alias;
    }

    public function setAlias($_alias) {
        $this->_alias = $_alias;
    }

    public function getSummary() {
        return $this->_summary;
    }

    public function setSummary($_summary) {
        $this->_summary = $_summary;
    }

    public function getContent() {
        return $this->_content;
    }

    public function setContent($_content) {
        $this->_content = $_content;
    }

    public function getMetaTitle() {
        return $this->_meta_title;
    }

    public function setMetaTitle($_meta_title) {
        $this->_meta_title = $_meta_title;
    }

    public function getMetaKeyword() {
        return $this->_meta_keyword;
    }

    public function setMetaKeyword($_meta_keyword) {
        $this->_meta_keyword = $_meta_keyword;
    }

    public function getMetaDescription() {
        return $this->_meta_description;
    }

    public function setMetaDescription($_meta_description) {
        $this->_meta_description = $_meta_description;
    }

    public function getLocale() {
        return $this->_locale;
    }

    public function setLocale($_locale) {
        $this->_locale = $_locale;
    }

    public function getContents() {
        return $this->_contents;
    }

    public function setContents($_contents) {
        $this->_contents = $_contents;
    }

}
