<?php

/**
 * WDS GROUP
 *
 * @name        Content.php
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
 * @Table(name="content")
 */
class Content {
    //`content_id`, `content_type_id`, `parent_id`, 
    //`user_id`, `start_date`, `expiry_date`, `hide_from_menu`

    /**
     * @Id
     * @Column(name="`content_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_content_id;
    
    /**
     * @Column(name="`start_date`", type="datetime")
     * @var \DateTime
     */
    private $_start_date;
    
    /**
     * @Column(name="`expiry_date`", type="datetime")
     * @var \DateTime
     */
    private $_expiry_date;
    
    /**
     * @Column(name="`hide_from_menu`", type="smallint", length=4)
     * @var int
     */
    private $_hide_from_menu;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_children")
     * @JoinColumn(name="parent_id", referencedColumnName="content_id")
     */
    private $_parent;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Content", mappedBy="_parent")     
     */
    private $_children;
    
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Content\Detail", mappedBy="_contents")
     */
    private $_content_detail;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Category\Association", mappedBy="_content")
     */
    private $_category_associations;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Menu\Content\Association", mappedBy="_content")
     */
    private $_menus_content_associations;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Archives", mappedBy="_content")
     */
    private $_archives;
    
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Comment", mappedBy="_content")
     */
    private $_comments;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Revision", mappedBy="_content")
     */
    private $_revision;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Schedule", mappedBy="_content")
     */
    private $_content_schedule;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Status", mappedBy="_content")
     */
    private $_content_status;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Votes", mappedBy="_content")
     */
    private $_votes;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Files", mappedBy="_content")
     */
    private $_files;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content\Type", inversedBy="_content")
     * @JoinColumn(name="content_type_id", referencedColumnName="content_type_id")     
     */
    private $_content_types;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Tag\Associations", mappedBy="_content")
     */
    private $_content_tags_associations;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Users", inversedBy="_content")
     * @JoinColumn(name="user_id", referencedColumnName="user_id")     
     */
    private $_users;
    
    public function getContentId() {
        return $this->_content_id;
    }

    public function getStartDate() {
        return $this->_start_date;
    }

    public function setStartDate($_start_date) {
        $this->_start_date = $_start_date;
    }

    public function getExpiryDate() {
        return $this->_expiry_date;
    }

    public function setExpiryDate($_expiry_date) {
        $this->_expiry_date = $_expiry_date;
    }

    public function getHideFromMenu() {
        return $this->_hide_from_menu;
    }

    public function setHideFromMenu($_hide_from_menu) {
        $this->_hide_from_menu = $_hide_from_menu;
    }

    public function getParent() {
        return $this->_parent;
    }

    public function setParent($_parent) {
        $this->_parent = $_parent;
    }

    public function getChildren() {
        return $this->_children;
    }

    public function setChildren($_children) {
        $this->_children = $_children;
    }

    public function getContentDetail() {
        return $this->_content_detail;
    }

    public function setContentDetail($_content_detail) {
        $this->_content_detail = $_content_detail;
    }

    public function getCategoryAssociations() {
        return $this->_category_associations;
    }

    public function setCategoryAssociations($_category_associations) {
        $this->_category_associations = $_category_associations;
    }

    public function getMenusContentAssociations() {
        return $this->_menus_content_associations;
    }

    public function setMenusContentAssociations($_menus_content_associations) {
        $this->_menus_content_associations = $_menus_content_associations;
    }

    public function getArchives() {
        return $this->_archives;
    }

    public function setArchives($_archives) {
        $this->_archives = $_archives;
    }

    public function getComments() {
        return $this->_comments;
    }

    public function setComments($_comments) {
        $this->_comments = $_comments;
    }

    public function getRevision() {
        return $this->_revision;
    }

    public function setRevision($_revision) {
        $this->_revision = $_revision;
    }

    public function getContentSchedule() {
        return $this->_content_schedule;
    }

    public function setContentSchedule($_content_schedule) {
        $this->_content_schedule = $_content_schedule;
    }

    public function getContentStatus() {
        return $this->_content_status;
    }

    public function setContentStatus($_content_status) {
        $this->_content_status = $_content_status;
    }

    public function getVotes() {
        return $this->_votes;
    }

    public function setVotes($_votes) {
        $this->_votes = $_votes;
    }

    public function getFiles() {
        return $this->_files;
    }

    public function setFiles($_files) {
        $this->_files = $_files;
    }

    public function getContentTypes() {
        return $this->_content_types;
    }

    public function setContentTypes($_content_types) {
        $this->_content_types = $_content_types;
    }

    public function getContentTagsAssociations() {
        return $this->_content_tags_associations;
    }

    public function setContentTagsAssociations($_content_tags_associations) {
        $this->_content_tags_associations = $_content_tags_associations;
    }

    public function getUsers() {
        return $this->_users;
    }

    public function setUsers($_users) {
        $this->_users = $_users;
    }


    
}
