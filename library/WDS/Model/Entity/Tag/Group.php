<?php

/**
 * WDS GROUP
 *
 * @name        Group.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Tag
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

namespace WDS\Model\Entity\Tag;

/**
 * @Entity 
 * @Table(name="tag_group")
 */
class Group {

    /**
     * @Id
     * @Column(name="`tag_group_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_tag_group_id;

    /**
     * @Column(name="`tag_group_title`", type="string", length=125)
     * @var string
     */
    private $_tag_group_title;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Tags", mappedBy="_tag_group")
     */
    private $_tags;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Tag\Associations", mappedBy="_tag_group")
     */
    private $_content_tags_associations;
    
    public function getTagGroupId() {
        return $this->_tag_group_id;
    }


    public function getTagGroupTitle() {
        return $this->_tag_group_title;
    }

    public function setTagGroupTitle($_tag_group_title) {
        $this->_tag_group_title = $_tag_group_title;
    }
    
    /**
     *
     * @return \WDS\Model\Entity\Tags
     */
    public function getTags() {
        return $this->_tags;
    }

    public function setTags($_tags) {
        $this->_tags = $_tags;
    }

    /**
     *
     * @return Associations
     */
    public function getContentTagsAssociations() {
        return $this->_content_tags_associations;
    }

    public function setContentTagsAssociations($_content_tags_associations) {
        $this->_content_tags_associations = $_content_tags_associations;
    }



}
