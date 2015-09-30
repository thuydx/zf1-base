<?php

/**
 * WDS GROUP
 *
 * @name        Associations.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Group
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

namespace WDS\Model\Entity\Group;

/**
 * @Entity 
 * @Table(name="group_associations")
 */
class Associations {

    /**
     * @Id
     * @Column(name="`group_association_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_group_association_id;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Users", inversedBy="_group_associations")
     * @JoinColumn(name="user_id", referencedColumnName="user_id")     
     */
    private $_users;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Groups", inversedBy="_group_associations")
     * @JoinColumn(name="group_id", referencedColumnName="group_id")     
     */
    private $_groups;

    public function getGroupAssociationId() {
        return $this->_group_association_id;
    }


    public function getUsers() {
        return $this->_users;
    }

    public function setUsers($_users) {
        $this->_users = $_users;
    }

    public function getGroups() {
        return $this->_groups;
    }

    public function setGroups($_groups) {
        $this->_groups = $_groups;
    }


    
}
