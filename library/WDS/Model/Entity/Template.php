<?php

/**
 * WDS GROUP
 *
 * @name        Template.php
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
 * @Table(name="template")
 */
class Template {

    /**
     * @Id
     * @Column(name="`template_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_template_id;

    /**
     * @Column(name="`template_name`", type="string", length=45)
     * @var string
     */
    private $_template_name;

    /**
     * @Column(name="`template_path`", type="string", length=255)
     * @var string
     */
    private $_template_path;

    /**
     * @Column(name="`template_default`", type="integer", length=11)
     * @var int
     */
    private $_template_default;

    /**
     * @Column(name="`template_author`", type="string", length=45)
     * @var string
     */
    private $_template_author;

    /**
     * @Column(name="`template_version`", type="string", length=45)
     * @var string
     */
    private $_template_version;
    
    /**
     * @OneToMany(targetEntity="\Mannv\Model\Entity\Widgets", mappedBy="_template")     
     */
    private $_widgets;

    public function getTemplateId() {
        return $this->_template_id;
    }
    public function getTemplateName() {
        return $this->_template_name;
    }

    public function setTemplateName($_template_name) {
        $this->_template_name = $_template_name;
    }

    public function getTemplatePath() {
        return $this->_template_path;
    }

    public function setTemplatePath($_template_path) {
        $this->_template_path = $_template_path;
    }

    public function getTemplateDefault() {
        return $this->_template_default;
    }

    public function setTemplateDefault($_template_default) {
        $this->_template_default = $_template_default;
    }

    public function getTemplateAuthor() {
        return $this->_template_author;
    }

    public function setTemplateAuthor($_template_author) {
        $this->_template_author = $_template_author;
    }

    public function getTemplateVersion() {
        return $this->_template_version;
    }

    public function setTemplateVersion($_template_version) {
        $this->_template_version = $_template_version;
    }

    public function getWidgets() {
        return $this->_widgets;
    }

    public function setWidgets($_widgets) {
        $this->_widgets = $_widgets;
    }


    
}
