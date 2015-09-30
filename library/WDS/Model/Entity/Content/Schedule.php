<?php

/**
 * WDS GROUP
 *
 * @name        Schedule.php
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
 * @Table(name="content_schedule")
 */
class Schedule {

    //`content_schedule_id`, `content_id`, `content_schedule_name`, 
    //`content_schedule_from`, 
    //`content_schedule_to`, `content_schedule_duration`
    /**
     * @Id
     * @Column(name="`content_schedule_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_content_schedule_id;

    /**
     * @Column(name="`content_schedule_name`", type="string", length=45)
     * @var string
     */
    private $_content_schedule_name;

    /**
     * @Column(name="`_content_schedule_from`", type="datetime")
     * @var \DateTime
     */
    private $_content_schedule_from;

    /**
     * @Column(name="`_content_schedule_to`", type="datetime")
     * @var \DateTime
     */
    private $_content_schedule_to;

    /**
     * @Column(name="`content_schedule_duration`", type="integer", length=11)
     * @var int
     */
    private $_content_schedule_duration;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_content_schedule")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;

    public function getContentScheduleId() {
        return $this->_content_schedule_id;
    }

    public function getContentScheduleName() {
        return $this->_content_schedule_name;
    }

    public function setContentScheduleName($_content_schedule_name) {
        $this->_content_schedule_name = $_content_schedule_name;
    }

    /**
     *
     * @return \DateTime
     */
    public function getContentScheduleFrom() {
        return $this->_content_schedule_from;
    }

    public function setContentScheduleFrom($_content_schedule_from) {
        $this->_content_schedule_from = $_content_schedule_from;
    }

    /**
     *
     * @return \DateTime
     */
    public function getContentScheduleTo() {
        return $this->_content_schedule_to;
    }

    public function setContentScheduleTo($_content_schedule_to) {
        $this->_content_schedule_to = $_content_schedule_to;
    }

    public function getContentScheduleDuration() {
        return $this->_content_schedule_duration;
    }

    public function setContentScheduleDuration($_content_schedule_duration) {
        $this->_content_schedule_duration = $_content_schedule_duration;
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
