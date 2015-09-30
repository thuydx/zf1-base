<?php

/**
 * WDS GROUP
 *
 * @name        Types.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Content
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

namespace WDS\Model\Entity\Content;

/**
 * @Entity 
 * @Table(name="content_types")
 */
class Types {

    /**
     * @Id
     * @Column(name="`content_type_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_content_type_id;

    /**
     * @Column(name="`content_type_name`", type="string", length=125)
     * @var string
     */
    private $_content_type_name;

    /**
     * @Column(name="`content_type_description`", type="string", length=255)
     * @var string
     */
    private $_content_type_description;

    /**
     * @Column(name="`enable_expiry`", type="smallint", length=4)
     * @var int
     */
    private $_enable_expiry;

    /**
     * @Column(name="`enable_vote`", type="smallint", length=4)
     * @var int
     */
    private $_enable_vote;

    /**
     * @Column(name="`enable_comment`", type="smallint", length=4)
     * @var int
     */
    private $_enable_comment;

    /**
     * @Column(name="`enable_attachment`", type="smallint", length=4)
     * @var int
     */
    private $_enable_attachment;

    /**
     * @Column(name="`enable_media`", type="smallint", length=4)
     * @var int
     */
    private $_enable_media;

    /**
     * @Column(name="`enable_tag`", type="smallint", length=4)
     * @var int
     */
    private $_enable_tag;

    /**
     * @Column(name="`enable_schedule`", type="smallint", length=4)
     * @var int
     */
    private $_enable_schedule;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Content", mappedBy="_content_types")
     */
    private $_content;
    
    public function getContentTypeId() {
        return $this->_content_type_id;
    }

    public function getContentTypeName() {
        return $this->_content_type_name;
    }

    public function setContentTypeName($_content_type_name) {
        $this->_content_type_name = $_content_type_name;
    }

    public function getContentTypeDescription() {
        return $this->_content_type_description;
    }

    public function setContentTypeDescription($_content_type_description) {
        $this->_content_type_description = $_content_type_description;
    }

    public function getEnableExpiry() {
        return $this->_enable_expiry;
    }

    public function setEnableExpiry($_enable_expiry) {
        $this->_enable_expiry = $_enable_expiry;
    }

    public function getEnableVote() {
        return $this->_enable_vote;
    }

    public function setEnableVote($_enable_vote) {
        $this->_enable_vote = $_enable_vote;
    }

    public function getEnableComment() {
        return $this->_enable_comment;
    }

    public function setEnableComment($_enable_comment) {
        $this->_enable_comment = $_enable_comment;
    }

    public function getEnableAttachment() {
        return $this->_enable_attachment;
    }

    public function setEnableAttachment($_enable_attachment) {
        $this->_enable_attachment = $_enable_attachment;
    }

    public function getEnableMedia() {
        return $this->_enable_media;
    }

    public function setEnableMedia($_enable_media) {
        $this->_enable_media = $_enable_media;
    }

    public function getEnableTag() {
        return $this->_enable_tag;
    }

    public function setEnableTag($_enable_tag) {
        $this->_enable_tag = $_enable_tag;
    }

    public function getEnableSchedule() {
        return $this->_enable_schedule;
    }

    public function setEnableSchedule($_enable_schedule) {
        $this->_enable_schedule = $_enable_schedule;
    }

    /**
     *
     * @return array \WDS\Model\Entity\Content
     */
    public function getContent() {
        return $this->_content;
    }

    public function setContent($_content) {
        $this->_content = $_content;
    }

}
