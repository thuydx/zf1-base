<?php

/**
 * WDS GROUP
 *
 * @name        Blocks.php
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
 * @Table(name="blocks")
 */
class Blocks {

    /**
     * @Id
     * @Column(name="`block_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_block_id;

    /**
     * @Column(name="`block_name`", type="string", length=255)
     * @var string
     */
    private $_block_name;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Hooks", inversedBy="_blocks")
     * @JoinColumn(name="hook_id", referencedColumnName="hook_id")     
     */
    private $_hooks;
    
    public function getBlockId() {
        return $this->_block_id;
    }


    public function getBlockName() {
        return $this->_block_name;
    }

    public function setBlockName($_block_name) {
        $this->_block_name = $_block_name;
    }

    public function getHooks() {
        return $this->_hooks;
    }

    public function setHooks($_hooks) {
        $this->_hooks = $_hooks;
    }



}
