<?php

/**
 * WDS GROUP
 *
 * @name        Users.php
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
 * @Table(name="users")
 */
class Users {

    /**
     * @Id
     * @Column(name="`user_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_user_id;

    /**
     * @Column(name="`user_password`", type="string", length=45)
     * @var string
     */
    private $_user_name;

    /**
     * @Column(name="`user_password_date`", type="string", length=45, unique=true)
     * @var string
     */
    private $_user_password;

    /**
     * @Column(name="`user_password_date`", type="datetime")
     * @var \DateTime
     */
    private $_user_password_date;

    /**
     * @Column(name="`user_email`", type="string", length=125, unique=true)
     * @var string
     */
    private $_user_email;

    /**
     * @Column(name="`user_title`", type="string", length=45)
     * @var string
     */
    private $_user_title;

    /**
     * @Column(name="`user_join_date`", type="datetime")
     * @var \DateTime
     */
    private $_user_join_date;

    /**
     * @Column(name="`user_last_visit`", type="datetime")
     * @var \DateTime
     */
    private $_user_last_visit;

    /**
     * @Column(name="`user_activity`", type="smallint", length=4)
     * @var int
     */
    private $_user_activity;

    /**
     * @Column(name="`user_post_count`", type="integer", length=11)
     * @var int
     */
    private $_user_post_count;

    /**
     * @Column(name="`user_ip_address`", type="string", length=45)
     * @var string
     */
    private $_user_ip_address;

    /**
     * @Column(name="`user_language_id`", type="integer", length=11)
     * @var int
     */
    private $_user_language_id;

    /**
     * @Column(name="`user_template_id`", type="integer", length=11)
     * @var int
     */
    private $_user_template_id;

    /**
     * @Column(name="`user_skin_id`", type="integer", length=11)
     * @var int
     */
    private $_user_skin_id;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Content", mappedBy="_users")
     */
    private $_content;

    /**
     * @OneToOne(targetEntity="\Mannv\Model\Entity\User\Detail", mappedBy="_users")     
     */
    private $_user_detail;

    /**
     * @OneToMany(targetEntity="\Mannv\Model\Entity\Contacts", mappedBy="_users")     
     */
    private $_contacts;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\User\Permissions", mappedBy="_users")     
     */
    private $_user_permissions;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Group\Associations", mappedBy="_users")     
     */
    private $_group_associations;
    
    public function getUserId() {
        return $this->_user_id;
    }

    public function getUserName() {
        return $this->_user_name;
    }

    public function setUserName($_user_name) {
        $this->_user_name = $_user_name;
    }

    public function getUserPassword() {
        return $this->_user_password;
    }

    public function setUserPassword($_user_password) {
        $this->_user_password = $_user_password;
    }

    public function getUserPassword_date() {
        return $this->_user_password_date;
    }

    public function setUserPassword_date($_user_password_date) {
        $this->_user_password_date = $_user_password_date;
    }

    public function getUserEmail() {
        return $this->_user_email;
    }

    public function setUserEmail($_user_email) {
        $this->_user_email = $_user_email;
    }

    public function getUserTitle() {
        return $this->_user_title;
    }

    public function setUserTitle($_user_title) {
        $this->_user_title = $_user_title;
    }

    public function getUserJoinDate() {
        return $this->_user_join_date;
    }

    public function setUserJoinDate($_user_join_date) {
        $this->_user_join_date = $_user_join_date;
    }

    public function getUserLastVisit() {
        return $this->_user_last_visit;
    }

    public function setUserLastVisit($_user_last_visit) {
        $this->_user_last_visit = $_user_last_visit;
    }

    public function getUserActivity() {
        return $this->_user_activity;
    }

    public function setUserActivity($_user_activity) {
        $this->_user_activity = $_user_activity;
    }

    public function getUserPostCount() {
        return $this->_user_post_count;
    }

    public function setUserPostCount($_user_post_count) {
        $this->_user_post_count = $_user_post_count;
    }

    public function getUserIpAddress() {
        return $this->_user_ip_address;
    }

    public function setUserIpAddress($_user_ip_address) {
        $this->_user_ip_address = $_user_ip_address;
    }

    public function getUserLanguageId() {
        return $this->_user_language_id;
    }

    public function setUserLanguageId($_user_language_id) {
        $this->_user_language_id = $_user_language_id;
    }

    public function getUserTemplateId() {
        return $this->_user_template_id;
    }

    public function setUserTemplateId($_user_template_id) {
        $this->_user_template_id = $_user_template_id;
    }

    public function getUserSkinId() {
        return $this->_user_skin_id;
    }

    public function setUserSkinId($_user_skin_id) {
        $this->_user_skin_id = $_user_skin_id;
    }

    public function getContent() {
        return $this->_content;
    }

    public function setContent($_content) {
        $this->_content = $_content;
    }

    public function getUserDetail() {
        return $this->_user_detail;
    }

    public function setUserDetail($_user_detail) {
        $this->_user_detail = $_user_detail;
    }

    public function getContacts() {
        return $this->_contacts;
    }

    public function setContacts($_contacts) {
        $this->_contacts = $_contacts;
    }

    public function getUserPermisions() {
        return $this->_user_permissions;
    }

    public function setUserPermisions($_user_permissions) {
        $this->_user_permissions = $_user_permissions;
    }

    public function getGroupAssociations() {
        return $this->_group_associations;
    }

    public function setGroupAssociations($_group_associations) {
        $this->_group_associations = $_group_associations;
    }


    

}
