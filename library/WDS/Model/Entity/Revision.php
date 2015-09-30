<?php

/**
 * WDS GROUP
 *
 * @name        Revision.php
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
 * @Table(name="revision")
 */
class Revision {

    //`revision_id`, `content_id`, `version`, `description`, `logs`
    /**
     * @Id
     * @Column(name="`revision_id`", type="integer", length=11)     
     * @var int
     */
    private $_revision_id;

    /**
     * @Id
     * @Column(name="`content_id`", type="integer", length=11)     
     * @var int
     */
    private $_content_id;

    /**
     * @Column(name="`version`", type="string", length=255)
     * @var string
     */
    private $_version;

    /**
     * @Column(name="`description`", type="string", length=255)
     * @var string
     */
    private $_description;

    /**
     * @Column(name="`logs`", type="string", length=255)
     * @var string
     */
    private $_logs;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_revision")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;

    public function getRevisionId() {
        return $this->_revision_id;
    }

    public function setRevisionId($_revision_id) {
        $this->_revision_id = $_revision_id;
    }

    public function getContentId() {
        return $this->_content_id;
    }

    public function setContentId($_content_id) {
        $this->_content_id = $_content_id;
    }

    public function getVersion() {
        return $this->_version;
    }

    public function setVersion($_version) {
        $this->_version = $_version;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function setDescription($_description) {
        $this->_description = $_description;
    }

    public function getLogs() {
        return $this->_logs;
    }

    public function setLogs($_logs) {
        $this->_logs = $_logs;
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
