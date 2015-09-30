<?php

/**
 * WDS GROUP
 *
 * @name        Tags.php
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
 * @Table(name="tags")
 */
class Tags {

    /**
     * @Id
     * @Column(name="`tag_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_tag_id;

    /**
     * @Column(name="`tag_text`", type="string", length=45)
     * @var string
     */
    private $_tag_text;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Tag\Group", inversedBy="_tags")
     * @JoinColumn(name="tag_group_id", referencedColumnName="tag_group_id")     
     */
    private $_tag_group;

    public function getTagId() {
        return $this->_tag_id;
    }

    public function getTagText() {
        return $this->_tag_text;
    }

    public function setTagText($_tag_text) {
        $this->_tag_text = $_tag_text;
    }

    public function getTagGroup() {
        return $this->_tag_group;
    }

    public function setTagGroup($_tag_group) {
        $this->_tag_group = $_tag_group;
    }


    
}
