<?php

/**
 * WDS GROUP
 *
 * @name        Associations.php
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
 * @Table(name="content_tags_associations")
 */
class Associations {

    /**
     * @Id
     * @Column(name="`tags_association_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_tags_association_id;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Tag\Group", inversedBy="_content_tags_associations")
     * @JoinColumn(name="tag_group_id", referencedColumnName="tag_group_id")     
     */
    private $_tag_group;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_content_tags_associations")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;
    
    public function getTagsAssociationId() {
        return $this->_tags_association_id;
    }

    /**
     *
     * @return Group
     */
    public function getTagGroup() {
        return $this->_tag_group;
    }

    public function setTagGroup($_tag_group) {
        $this->_tag_group = $_tag_group;
    }

    /**
     *
     * @return \WDS\Model\Entity\Content
     */
    public function getContent() {
        return $this->_content;
    }

    public function setContent($_content) {
        $this->_content = $_content;
    }


    
}
