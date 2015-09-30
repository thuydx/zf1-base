<?php

/**
 * WDS GROUP
 *
 * @name        Permissions.php
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
 * @Table(name="group_permissions")
 */
class Permissions {

    /**
     * @Id
     * @Column(name="`group_permision_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_group_permision_id;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Roles", inversedBy="_group_permissions")
     * @JoinColumn(name="role_id", referencedColumnName="role_id")     
     */
    private $_roles;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Groups", inversedBy="_group_permissions")
     * @JoinColumn(name="group_id", referencedColumnName="group_id")     
     */
    private $_groups;
    
    public function getGroupPermisionId() {
        return $this->_group_permision_id;
    }

    public function getRoles() {
        return $this->_roles;
    }

    public function setRoles($_roles) {
        $this->_roles = $_roles;
    }

    public function getGroups() {
        return $this->_groups;
    }

    public function setGroups($_groups) {
        $this->_groups = $_groups;
    }


    
}
