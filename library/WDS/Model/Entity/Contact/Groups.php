<?php

/**
 * WDS GROUP
 *
 * @name        Groups.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Contact
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

namespace WDS\Model\Entity\Contact;

/**
 * @Entity 
 * @Table(name="contact_groups")
 */
class Groups {

    /**
     * @Id
     * @Column(name="`contact_group_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_contact_group_id;

    /**
     * @Column(name="`contact_group_name`", type="string", length=45)
     * @var string
     */
    private $_contact_group_name;

    /**
     * @Column(name="`contact_group_description`", type="string", length=255)
     * @var string
     */
    private $_contact_group_description;

    /**
     * @Column(name="`contact_group_address`", type="string", length=125)
     * @var string
     */
    private $_contact_group_address;

    /**
     * @Column(name="`contact_group_phone`", type="string", length=45)
     * @var string
     */
    private $_contact_group_phone;

    /**
     * @Column(name="`contact_group_telephone`", type="string", length=45)
     * @var string
     */
    private $_contact_group_telephone;

    /**
     * @Column(name="`contact_group_fax`", type="string", length=45)
     * @var string
     */
    private $_contact_group_fax;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Content", mappedBy="_contact_groups")
     */
    private $_contact_associations;
    
    public function getContactGroupId() {
        return $this->_contact_group_id;
    }

    public function getContactGroupName() {
        return $this->_contact_group_name;
    }

    public function setContactGroupName($_contact_group_name) {
        $this->_contact_group_name = $_contact_group_name;
    }

    public function getContactGroupDescription() {
        return $this->_contact_group_description;
    }

    public function setContactGroupDescription($_contact_group_description) {
        $this->_contact_group_description = $_contact_group_description;
    }

    public function getContactGroupAddress() {
        return $this->_contact_group_address;
    }

    public function setContactGroupAddress($_contact_group_address) {
        $this->_contact_group_address = $_contact_group_address;
    }

    public function getContactGroupPhone() {
        return $this->_contact_group_phone;
    }

    public function setContactGroupPhone($_contact_group_phone) {
        $this->_contact_group_phone = $_contact_group_phone;
    }

    public function getContactGroupTelephone() {
        return $this->_contact_group_telephone;
    }

    public function setContactGroupTelephone($_contact_group_telephone) {
        $this->_contact_group_telephone = $_contact_group_telephone;
    }

    public function getContactGroupFax() {
        return $this->_contact_group_fax;
    }

    public function setContactGroupFax($_contact_group_fax) {
        $this->_contact_group_fax = $_contact_group_fax;
    }

    public function getContactAssociations() {
        return $this->_contact_associations;
    }

    public function setContactAssociations($_contact_associations) {
        $this->_contact_associations = $_contact_associations;
    }
    
}
