<?php

/**
 * WDS GROUP
 *
 * @name        Comments.php
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
 * @Table(name="comments")
 */
class Comments {

    //`comment_id`, `content_id`, `comment_text`, `comment_date`, `comment_author`, 
    //`comment_author_email`, `comment_author_site`, `comment_status`
    /**
     * @Id
     * @Column(name="`comment_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_comment_id;

    /**
     * @Column(name="`comment_text`", type="string", length=255)
     * @var string
     */
    private $_comment_text;

    /**
     * @Column(name="`comment_date`", type="datetime")
     * @var \DateTime
     */
    private $_comment_date;

    /**
     * @Column(name="`comment_author`", type="string", length=45)
     * @var string
     */
    private $_comment_author;

    /**
     * @Column(name="`comment_author_email`", type="string", length=125)
     * @var string
     */
    private $_comment_author_email;

    /**
     * @Column(name="`comment_author_site`", type="string", length=125)
     * @var string
     */
    private $_comment_author_site;

    /**
     * @Column(name="`comment_status`", type="smallint", length=4)
     * @var int
     */
    private $_comment_status;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="comments")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;

    public function getCommentId() {
        return $this->_comment_id;
    }

    public function getCommentText() {
        return $this->_comment_text;
    }

    public function setCommentText($_comment_text) {
        $this->_comment_text = $_comment_text;
    }

    /**
     *
     * @return \DateTime
     */
    public function getCommentDate() {
        return $this->_comment_date;
    }

    public function setCommentDate($_comment_date) {
        $this->_comment_date = $_comment_date;
    }

    public function getCommentAuthor() {
        return $this->_comment_author;
    }

    public function setCommentAuthor($_comment_author) {
        $this->_comment_author = $_comment_author;
    }

    public function getCommentAuthorEmail() {
        return $this->_comment_author_email;
    }

    public function setCommentAuthorEmail($_comment_author_email) {
        $this->_comment_author_email = $_comment_author_email;
    }

    public function getCommentAuthorSite() {
        return $this->_comment_author_site;
    }

    public function setCommentAuthorSite($_comment_author_site) {
        $this->_comment_author_site = $_comment_author_site;
    }

    public function getCommentStatus() {
        return $this->_comment_status;
    }

    public function setCommentStatus($_comment_status) {
        $this->_comment_status = $_comment_status;
    }
    
    /**
     *
     * @return Content
     */
    public function getContent() {
        return $this->_content;
    }

    public function setContent($_content) {
        $this->_content = $_content;
    }


    
}
