<?php

/**
 * WDS GROUP
 *
 * @name        Archives.php
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
 * @Table(name="archives")
 */
class Archives {

    //`archive_id`, `content_id`, `archive_date`, `archive_downloadable`, `archive_vieweable`
    /**
     * @Id
     * @Column(name="`archive_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_archive_id;

    /**
     * @Column(name="`archive_date`", type="datetime")
     * @var \DateTime
     */
    private $_archive_date;

    /**
     * @Column(name="`archive_downloadable`", type="smallint", length=4)
     * @var int
     */
    private $_archive_downloadable;

    /**
     * @Column(name="`archive_vieweable`", type="smallint", length=4)
     * @var int
     */
    private $_archive_vieweable;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_archives")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;

    public function getArchiveId() {
        return $this->_archive_id;
    }

    /**
     *
     * @return \DateTime
     */
    public function getArchiveDate() {
        return $this->_archive_date;
    }

    public function setArchiveDate($_archive_date) {
        $this->_archive_date = $_archive_date;
    }

    public function getArchiveDownloadable() {
        return $this->_archive_downloadable;
    }

    public function setArchiveDownloadable($_archive_downloadable) {
        $this->_archive_downloadable = $_archive_downloadable;
    }

    public function getArchiveVieweable() {
        return $this->_archive_vieweable;
    }

    public function setArchiveVieweable($_archive_vieweable) {
        $this->_archive_vieweable = $_archive_vieweable;
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
