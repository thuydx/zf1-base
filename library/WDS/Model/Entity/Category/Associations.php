<?php

/**
 * WDS GROUP
 *
 * @name        Associations.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Category
 * @author      Man Ha Anh <manha@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 1:36:28 PM - 2011
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


namespace WDS\Model\Entity\Category;

/**
 * @Entity
 * @Table(name="category_associations")
 */
class Associations {

    //`category_association_id`, `category_id`, `content_id`
    /**
     * @Id
     * @Column(name="`category_association_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_category_association_id;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Categories", inversedBy="_category_associations")
     * @JoinColumn(name="category_id", referencedColumnName="category_id")     
     * category_id
     */
    private $_categories;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_category_associations")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     * category_id
     */
    private $_content;
    
    public function getCategoryAssociationId() {
        return $this->_category_association_id;
    }

    public function setCategoryAssociationId($_category_association_id) {
        $this->_category_association_id = $_category_association_id;
    }

    /**
     *
     * @return \WDS\Model\Entity\Category
     */
    public function getCategories() {
        return $this->_categories;
    }

    public function setCategories($_category) {
        $this->_categories = $_category;
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
