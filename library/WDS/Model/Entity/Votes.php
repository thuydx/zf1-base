<?php

/**
 * WDS GROUP
 *
 * @name        Votes.php
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
 * @Table(name="votes")
 */
class Votes {

    //`vote_id`, `content_id`, `vote_title`, `vote_count`
    /**
     * @Id
     * @Column(name="`vote_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_vote_id;

    /**
     * @Column(name="`vote_title`", type="string", length=45)
     * @var string
     */
    private $_vote_title;

    /**
     * @Column(name="`vote_count`", type="integer", length=11)
     * @var int
     */
    private $_vote_count;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Content", inversedBy="_votes")
     * @JoinColumn(name="content_id", referencedColumnName="content_id")     
     */
    private $_content;

    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Vote\Options", mappedBy="_votes")
     */
    private $_vote_options;
    
    public function getVoteId() {
        return $this->_vote_id;
    }


    public function getVoteTitle() {
        return $this->_vote_title;
    }

    public function setVoteTitle($_vote_title) {
        $this->_vote_title = $_vote_title;
    }

    public function getVoteCount() {
        return $this->_vote_count;
    }

    public function setVoteCount($_vote_count) {
        $this->_vote_count = $_vote_count;
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

    /**
     *
     * @return \WDS\Model\Vote\Options
     */
    public function getVoteOptions() {
        return $this->_vote_options;
    }

    public function setVoteOptions($_vote_options) {
        $this->_vote_options = $_vote_options;
    }


    
}
