<?php

/**
 * WDS GROUP
 *
 * @name        Widgets.php
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
 * @Table(name="widgets")
 */
class Widgets {

    /**
     * @Id
     * @Column(name="`widget_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_widget_id;

    /**
     * @Column(name="`widget_name`", type="string", length=45)
     * @var string
     */
    private $_widget_name;

    /**
     * @Column(name="`widget_file`", type="string", length=255)
     * @var string
     */
    private $_widget_file;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Template", inversedBy="_widgets")
     * @JoinColumn(name="template_id", referencedColumnName="template_id")     
     */
    private $_template;

    /**
     * @OneToMany(targetEntity="\Mannv\Model\Entity\Hooks", mappedBy="_widgets")     
     */
    private $_hooks;
    
    public function getWidgetId() {
        return $this->_widget_id;
    }

    public function getWidgetName() {
        return $this->_widget_name;
    }

    public function setWidgetName($_widget_name) {
        $this->_widget_name = $_widget_name;
    }

    public function getWidgetFile() {
        return $this->_widget_file;
    }

    public function setWidgetFile($_widget_file) {
        $this->_widget_file = $_widget_file;
    }

    public function getTemplate() {
        return $this->_template;
    }

    public function setTemplate($_template) {
        $this->_template = $_template;
    }

    public function getHooks() {
        return $this->_hooks;
    }

    public function setHooks($_hooks) {
        $this->_hooks = $_hooks;
    }


    
}
