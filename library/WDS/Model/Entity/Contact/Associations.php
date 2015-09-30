<?php

/**
 * WDS GROUP
 *
 * @name        Associations.php
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
 * @Table(name="contact_associations")
 */
class Associations {

    /**
     * @Id
     * @Column(name="`contact_association_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_contact_association_id;
    

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Contact\Groups", inversedBy="_contact_associations")
     * @JoinColumn(name="contact_group_id", referencedColumnName="contact_group_id")     
     */
    private $_contact_groups;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Contacts", inversedBy="_contact_associations")
     * @JoinColumn(name="contact_id", referencedColumnName="contact_id")     
     */
    private $_contacts;
    
    public function getContactAssociationId() {
        return $this->_contact_association_id;
    }

    public function getContactGroups() {
        return $this->_contact_groups;
    }

    public function setContactGroups($_contact_groups) {
        $this->_contact_groups = $_contact_groups;
    }

    public function getContacts() {
        return $this->_contacts;
    }

    public function setContacts($_contacts) {
        $this->_contacts = $_contacts;
    }

}
