<?php

/**
 * WDS GROUP
 *
 * @name        Contacts.php
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
 * @Table(name="contacts")
 */
class Contacts {

    /**
     * @Id
     * @Column(name="`contact_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_contact_id;

    /**
     * @Column(name="`contact_name`", type="string", length=45)
     * @var string
     */
    private $_contact_name;

    /**
     * @Column(name="`contact_address`", type="string", length=255)
     * @var string
     */
    private $_contact_address;

    /**
     * @Column(name="`contact_telephone`", type="string", length=45)
     * @var string
     */
    private $_contact_telephone;

    /**
     * @Column(name="`contact_phone`", type="string", length=45)
     * @var string
     */
    private $_contact_phone;

    /**
     * @Column(name="`contact_email`", type="string", length=125)
     * @var string
     */
    private $_contact_email;

    /**
     * @Column(name="`contact_fax`", type="string", length=125)
     * @var string
     */
    private $_contact_fax;

    /**
     * @Column(name="`contact_city`", type="string", length=125)
     * @var string
     */
    private $_contact_city;

    /**
     * @Column(name="`contact_county`", type="string", length=125)
     * @var string
     */
    private $_contact_county;

    /**
     * @Column(name="`contact_state`", type="string", length=125)
     * @var string
     */
    private $_contact_state;

    /**
     * @Column(name="`contact_country`", type="string", length=125)
     * @var string
     */
    private $_contact_country;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Users", inversedBy="_contacts")
     * @JoinColumn(name="user_id", referencedColumnName="user_id")     
     */
    private $_users;
    
    /**
     * @OneToOne(targetEntity="\Mannv\Model\Entity\Contact\Associations", mappedBy="_contacts")     
     */
    private $_contact_associations;

    public function getContactId() {
        return $this->_contact_id;
    }
    
    public function getContactName() {
        return $this->_contact_name;
    }

    public function setContactName($_contact_name) {
        $this->_contact_name = $_contact_name;
    }

    public function getContactAddress() {
        return $this->_contact_address;
    }

    public function setContactAddress($_contact_address) {
        $this->_contact_address = $_contact_address;
    }

    public function getContactTelephone() {
        return $this->_contact_telephone;
    }

    public function setContactTelephone($_contact_telephone) {
        $this->_contact_telephone = $_contact_telephone;
    }

    public function getContactPhone() {
        return $this->_contact_phone;
    }

    public function setContactPhone($_contact_phone) {
        $this->_contact_phone = $_contact_phone;
    }

    public function getContactEmail() {
        return $this->_contact_email;
    }

    public function setContactEmail($_contact_email) {
        $this->_contact_email = $_contact_email;
    }

    public function getContactFax() {
        return $this->_contact_fax;
    }

    public function setContactFax($_contact_fax) {
        $this->_contact_fax = $_contact_fax;
    }

    public function getContactCity() {
        return $this->_contact_city;
    }

    public function setContactCity($_contact_city) {
        $this->_contact_city = $_contact_city;
    }

    public function getContactCounty() {
        return $this->_contact_county;
    }

    public function setContactCounty($_contact_county) {
        $this->_contact_county = $_contact_county;
    }

    public function getContactState() {
        return $this->_contact_state;
    }

    public function setContactState($_contact_state) {
        $this->_contact_state = $_contact_state;
    }

    public function getContactCountry() {
        return $this->_contact_country;
    }

    public function setContactCountry($_contact_country) {
        $this->_contact_country = $_contact_country;
    }

    public function getUsers() {
        return $this->_users;
    }

    public function setUsers($_users) {
        $this->_users = $_users;
    }

    public function getContactAssociations() {
        return $this->_contact_associations;
    }

    public function setContactAssociations($_contact_associations) {
        $this->_contact_associations = $_contact_associations;
    }


    
}
