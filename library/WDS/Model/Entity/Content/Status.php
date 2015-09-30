<?php

/**
 * WDS GROUP
 *
 * @name        Status.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Content
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

namespace WDS\Model\Entity\Content;

/**
 * @Entity 
 * @Table(name="content_status")
 */
class Status {

    //`content_statu_id`, `content_id`, `status_title`
    /**
     * @Id
     * @Column(name="`content_statu_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_content_statu_id;

    /**
     * @Column(name="`status_title`", type="string", length=45)
     * @var string
     */
    private $_status_title;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_content_status")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;
    
    public function getContentStatuId() {
        return $this->_content_statu_id;
    }

    public function getStatusTitle() {
        return $this->_status_title;
    }

    public function setStatusTitle($_status_title) {
        $this->_status_title = $_status_title;
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
