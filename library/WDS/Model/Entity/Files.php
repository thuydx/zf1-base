<?php

/**
 * WDS GROUP
 *
 * @name        Files.php
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
 * @Table(name="files")
 */
class Files {

    /**
     * @Id
     * @Column(name="`attachment_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_attachment_id;

    /**
     * @Column(name="`file_name`", type="string", length=45)
     * @var string
     */
    private $_file_name;

    /**
     * @Column(name="`file_caption`", type="string", length=45)
     * @var string
     */
    private $_file_caption;

    /**
     * @Column(name="`file_counter`", type="integer", length=11)
     * @var int
     */
    private $_file_counter;

    /**
     * @Column(name="`file_path`", type="string", length=255)
     * @var string
     */
    private $_file_path;

    /**
     * @Column(name="`file_path_md5`", type="string", length=255)
     * @var string
     */
    private $_file_path_md5;

    /**
     * @Column(name="`file_size`", type="integer", length=11)
     * @var int
     */
    private $_file_size;

    /**
     * @Column(name="`file_info`", type="string", length=255)
     * @var string
     */
    private $_file_info;

    /**
     * @Column(name="`file_tile`", type="datetime")
     * @var \DateTime
     */
    private $_file_time;

    /**
     * @Column(name="`file_status`", type="integer", length=11)
     * @var int
     */
    private $_file_status;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_files")
     * @JoinColumn(name="file_type_id", referencedColumnName="file_type_id")     
     */
    private $_file_types;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_files")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;
    
    public function getAttachmentId() {
        return $this->_attachment_id;
    }


    public function getFileName() {
        return $this->_file_name;
    }

    public function setFileName($_file_name) {
        $this->_file_name = $_file_name;
    }

    public function getFileCaption() {
        return $this->_file_caption;
    }

    public function setFileCaption($_file_caption) {
        $this->_file_caption = $_file_caption;
    }

    public function getFileCounter() {
        return $this->_file_counter;
    }

    public function setFileCounter($_file_counter) {
        $this->_file_counter = $_file_counter;
    }

    public function getFilePath() {
        return $this->_file_path;
    }

    public function setFilePath($_file_path) {
        $this->_file_path = $_file_path;
    }

    public function getFilePathMd5() {
        return $this->_file_path_md5;
    }

    public function setFilePathMd5($_file_path_md5) {
        $this->_file_path_md5 = $_file_path_md5;
    }

    public function getFileSize() {
        return $this->_file_size;
    }

    public function setFileSize($_file_size) {
        $this->_file_size = $_file_size;
    }

    public function getFileInfo() {
        return $this->_file_info;
    }

    public function setFileInfo($_file_info) {
        $this->_file_info = $_file_info;
    }

    public function getFileTime() {
        return $this->_file_time;
    }

    public function setFileTime($_file_time) {
        $this->_file_time = $_file_time;
    }

    public function getFileStatus() {
        return $this->_file_status;
    }

    public function setFileStatus($_file_status) {
        $this->_file_status = $_file_status;
    }

    /**
     *
     * @return \WDS\Model\Entity\File\Types
     */
    public function getFileTypes() {
        return $this->_file_types;
    }

    public function setFileTypes($_file_types) {
        $this->_file_types = $_file_types;
    }

    /**
     *
     * @return \WDS\Model\Entity\Content
     */
    public function getContent() {
        return $this->_content;
    }

    public function setContent($_content) {
        $this->_content = $_content;
    }


    

}
