<?php

/**
 * WDS GROUP
 *
 * @name        Groups.php
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
 * @Table(name="groups")
 */
class Groups {

    /**
     * @Id
     * @Column(name="`group_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_group_id;

    /**
     * @Column(name="`group_title`", type="string", length=455)
     * @var string
     */
    private $_group_title;

    /**
     * @Column(name="`group_description`", type="string", length=255)
     * @var string
     */
    private $_group_description;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Group\Associations", mappedBy="_groups")     
     */
    private $_group_associations;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Group\Permisions", mappedBy="_groups")     
     */
    private $_group_permissions;
    
    public function getGroupId() {
        return $this->_group_id;
    }

    public function getGroupTitle() {
        return $this->_group_title;
    }

    public function setGroupTitle($_group_title) {
        $this->_group_title = $_group_title;
    }

    public function getGroupDescription() {
        return $this->_group_description;
    }

    public function setGroupDescription($_group_description) {
        $this->_group_description = $_group_description;
    }

    public function getGroupAssociations() {
        return $this->_group_associations;
    }

    public function setGroupAssociations($_group_associations) {
        $this->_group_associations = $_group_associations;
    }

    public function getGroupPermisions() {
        return $this->_group_permissions;
    }

    public function setGroupPermisions($_group_permissions) {
        $this->_group_permissions = $_group_permissions;
    }


    
    
}
