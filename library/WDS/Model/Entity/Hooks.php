<?php

/**
 * WDS GROUP
 *
 * @name        Hooks.php
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
 * @Table(name="hooks")
 */
class Hooks {

    //`hook_id`, `widget_id`, `hook_name`, `hook_code`, `hook_position`
    /**
     * @Id
     * @Column(name="`hook_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_hook_id;

    /**
     * @Column(name="`hook_name`", type="string", length=45)
     * @var string
     */
    private $_hook_name;

    /**
     * @Column(name="`hook_code`", type="string", length=255)
     * @var string
     */
    private $_hook_code;

    /**
     * @Column(name="`hook_position`", type="string", length=255)
     * @var string
     */
    private $_hook_position;

    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Template", inversedBy="_hooks")
     * @JoinColumn(name="widget_id", referencedColumnName="widget_id")     
     */
    private $_widgets;
    
    /**
     * @OneToMany(targetEntity="\Mannv\Model\Entity\Blocks", mappedBy="_hooks")     
     */
    private $_blocks;
    
    public function getHookId() {
        return $this->_hook_id;
    }


    public function getHookName() {
        return $this->_hook_name;
    }

    public function setHookName($_hook_name) {
        $this->_hook_name = $_hook_name;
    }

    public function getHookCode() {
        return $this->_hook_code;
    }

    public function setHookCode($_hook_code) {
        $this->_hook_code = $_hook_code;
    }

    public function getHookPosition() {
        return $this->_hook_position;
    }

    public function setHookPosition($_hook_position) {
        $this->_hook_position = $_hook_position;
    }

    public function getWidgets() {
        return $this->_widgets;
    }

    public function setWidgets($_widgets) {
        $this->_widgets = $_widgets;
    }

    public function getBlocks() {
        return $this->_blocks;
    }

    public function setBlocks($_blocks) {
        $this->_blocks = $_blocks;
    }


    
}
