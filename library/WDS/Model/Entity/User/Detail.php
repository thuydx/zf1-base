<?php

/**
 * WDS GROUP
 *
 * @name        Detail.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  User
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

namespace WDS\Model\Entity\User;

/**
 * @Entity 
 * @Table(name="user_detail")
 */
class Detail {

    /**
     * @Id
     * @Column(name="`user_detail_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_user_detail_id;

    /**
     * @Column(name="`first_name`", type="string", length=45)
     * @var string
     */
    private $_first_name;

    /**
     * @Column(name="`last_name`", type="string", length=45)
     * @var string
     */
    private $_last_name;

    /**
     * @Column(name="`date_of_birth`", type="datetime")
     * @var \DateTime
     */
    private $_date_of_birth;

    /**
     * @Column(name="`website`", type="string", length=125)
     * @var string
     */
    private $_website;

    /**
     * @Column(name="`gender`", type="string", length=1)
     * @var string
     */
    private $_gender;

    /**
     * @Column(name="`marital_status`", type="string", length=1)
     * @var string
     */
    private $_marital_status;

    /**
     * @Column(name="`telephone`", type="string", length=45)
     * @var string
     */
    private $_telephone;

    /**
     * @Column(name="`mobile_phone`", type="string", length=45)
     * @var string
     */
    private $_mobile_phone;

    /**
     * @Column(name="`education`", type="string", length=255)
     * @var string
     */
    private $_education;

    /**
     * @Column(name="`job_title`", type="string", length=45)
     * @var string
     */
    private $_job_title;

    /**
     * @Column(name="`job_position`", type="string", length=45)
     * @var string
     */
    private $_job_position;

    /**
     * @Column(name="`special_skill`", type="string", length=255)
     * @var string
     */
    private $_special_skill;

    /**
     * @Column(name="`communication_skill`", type="string", length=255)
     * @var string
     */
    private $_communication_skill;

    /**
     * @Column(name="`planning_skill`", type="string", length=255)
     * @var string
     */
    private $_planning_skill;

    /**
     * @Column(name="`time_management`", type="string", length=255)
     * @var string
     */
    private $_time_management;

    /**
     * @Column(name="`leadership_skill`", type="string", length=255)
     * @var string
     */
    private $_leadership_skill;

    /**
     * @Column(name="`teamwork_skill`", type="string", length=255)
     * @var string
     */
    private $_teamwork_skill;

    /**
     * @Column(name="`practical_experence`", type="string", length=255)
     * @var string
     */
    private $_practical_experence;

    /**
     * @Column(name="`reference`", type="string", length=255)
     * @var string
     */
    private $_reference;

    /**
     * @OneToOne(targetEntity="\Mannv\Model\Entity\Users", inversedBy="_user_detail")
     * @JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $_users;
    
    public function getUserDetailId() {
        return $this->_user_detail_id;
    }
    
    public function getFirstName() {
        return $this->_first_name;
    }

    public function setFirstName($_first_name) {
        $this->_first_name = $_first_name;
    }

    public function getLastName() {
        return $this->_last_name;
    }

    public function setLastName($_last_name) {
        $this->_last_name = $_last_name;
    }

    public function getDateOfBirth() {
        return $this->_date_of_birth;
    }

    public function setDateOfBirth($_date_of_birth) {
        $this->_date_of_birth = $_date_of_birth;
    }

    public function getWebsite() {
        return $this->_website;
    }

    public function setWebsite($_website) {
        $this->_website = $_website;
    }

    public function getGender() {
        return $this->_gender;
    }

    public function setGender($_gender) {
        $this->_gender = $_gender;
    }

    public function getMaritalStatus() {
        return $this->_marital_status;
    }

    public function setMaritalStatus($_marital_status) {
        $this->_marital_status = $_marital_status;
    }

    public function getTelephone() {
        return $this->_telephone;
    }

    public function setTelephone($_telephone) {
        $this->_telephone = $_telephone;
    }

    public function getMobilePhone() {
        return $this->_mobile_phone;
    }

    public function setMobilePhone($_mobile_phone) {
        $this->_mobile_phone = $_mobile_phone;
    }

    public function getEducation() {
        return $this->_education;
    }

    public function setEducation($_education) {
        $this->_education = $_education;
    }

    public function getJobTitle() {
        return $this->_job_title;
    }

    public function setJobTitle($_job_title) {
        $this->_job_title = $_job_title;
    }

    public function getJobPosition() {
        return $this->_job_position;
    }

    public function setJobPosition($_job_position) {
        $this->_job_position = $_job_position;
    }

    public function getSpecialSkill() {
        return $this->_special_skill;
    }

    public function setSpecialSkill($_special_skill) {
        $this->_special_skill = $_special_skill;
    }

    public function getCommunicationSkill() {
        return $this->_communication_skill;
    }

    public function setCommunicationSkill($_communication_skill) {
        $this->_communication_skill = $_communication_skill;
    }

    public function getPlanningSkill() {
        return $this->_planning_skill;
    }

    public function setPlanningSkill($_planning_skill) {
        $this->_planning_skill = $_planning_skill;
    }

    public function getTimeManagement() {
        return $this->_time_management;
    }

    public function setTimeManagement($_time_management) {
        $this->_time_management = $_time_management;
    }

    public function getLeadershipSkill() {
        return $this->_leadership_skill;
    }

    public function setLeadershipSkill($_leadership_skill) {
        $this->_leadership_skill = $_leadership_skill;
    }

    public function getTeamworkSkill() {
        return $this->_teamwork_skill;
    }

    public function setTeamworkSkill($_teamwork_skill) {
        $this->_teamwork_skill = $_teamwork_skill;
    }

    public function getPracticalExperence() {
        return $this->_practical_experence;
    }

    public function setPracticalExperence($_practical_experence) {
        $this->_practical_experence = $_practical_experence;
    }

    public function getReference() {
        return $this->_reference;
    }

    public function setReference($_reference) {
        $this->_reference = $_reference;
    }
    
    public function getUsers() {
        return $this->_users;
    }
    
    public function setUsers($_users) {
        $this->_users = $_users;
    }



}
