<?php

/**
 * WDS GROUP
 *
 * @name        Associations.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Menu/Content
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

namespace WDS\Model\Entity\Menu\Content;

/**
 * @Entity 
 * @Table(name="menus_content_associations")
 */
class Associations {

    //`menu_content_association_id`, `menu_id`, `content_id`
    /**
     * @Id
     * @Column(name="`menu_content_association_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_menu_content_association_id;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Menus", inversedBy="_menus_content_associations")
     * @JoinColumn(name="menu_id", referencedColumnName="menu_id")     
     */
    private $_menus;
    
    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_menus_content_associations")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;
    
    public function getMenuContentAssociation_id() {
        return $this->_menu_content_association_id;
    }
    
    /**
     *
     * @return \WDS\Model\Entity\Menu
     */
    public function getMenus() {
        return $this->_menus;
    }

    public function setMenus($_menus) {
        $this->_menus = $_menus;
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
