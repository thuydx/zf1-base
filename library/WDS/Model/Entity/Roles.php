<?php

/**
 * WDS GROUP
 *
 * @name        Roles.php
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
 * @Table(name="roles")
 */
class Roles {

    /**
     * @Id
     * @Column(name="`role_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_role_id;

    /**
     * @Column(name="`role_title`", type="string", length=45)
     * @var string
     */
    private $_role_title;

    /**
     * @Column(name="`role_description`", type="string", length=255)
     * @var string
     */
    private $_role_description;

    /**
     * @Column(name="`module`", type="string", length=45)
     * @var string
     */
    private $_module;

    /**
     * @Column(name="`controller`", type="string", length=45)
     * @var string
     */
    private $_controller;

    /**
     * @Column(name="`action`", type="string", length=45)
     * @var string
     */
    private $_action;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\User\Permissions", mappedBy="_roles")
     */
    private $_role_user_permissions;
    
    
     /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Group\Permissions", mappedBy="_roles")
     */
    private $_group_permissions;
    
    public function getRoleId() {
        return $this->_role_id;
    }

    public function getGroupPermisions() {
        return $this->_group_permissions;
    }

    public function setGroupPermisions($_group_permissions) {
        $this->_group_permissions = $_group_permissions;
    }

    
    public function getRoleTitle() {
        return $this->_role_title;
    }

    public function setRoleTitle($_role_title) {
        $this->_role_title = $_role_title;
    }

    public function getRoleDescription() {
        return $this->_role_description;
    }

    public function setRoleDescription($_role_description) {
        $this->_role_description = $_role_description;
    }

    public function getModule() {
        return $this->_module;
    }

    public function setModule($_module) {
        $this->_module = $_module;
    }

    public function getController() {
        return $this->_controller;
    }

    public function setController($_controller) {
        $this->_controller = $_controller;
    }

    public function getAction() {
        return $this->_action;
    }

    public function setAction($_action) {
        $this->_action = $_action;
    }

    public function getUserPermisions() {
        return $this->_user_permissions;
    }

    public function setUserPermisions($_user_permissions) {
        $this->_user_permissions = $_user_permissions;
    }


    
}
