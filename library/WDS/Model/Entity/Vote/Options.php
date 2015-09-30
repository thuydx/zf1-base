<?php

/**
 * WDS GROUP
 *
 * @name        Options.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  Vote
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

namespace WDS\Model\Entity\Vote;

/**
 * @Entity 
 * @Table(name="vote_options")
 */
class Options {

    //`vote_option_id`, `vote_id`, `vote_option`, `vote_option_count`    
    /**
     * @Id
     * @Column(name="`vote_option_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_vote_option_id;

    /**
     * @Column(name="`vote_option`", type="string", length=255)
     * @var string
     */
    private $_vote_option;

    /**
     * @Column(name="`vote_option_count`", type="integer", length=11)
     * @var int
     */
    private $_vote_option_count;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Votes", inversedBy="_vote_options")
     * @JoinColumn(name="vote_id", referencedColumnName="vote_id")     
     */
    private $_vote;

    public function getVoteOptionId() {
        return $this->_vote_option_id;
    }


    public function getVoteOption() {
        return $this->_vote_option;
    }

    public function setVoteOption($_vote_option) {
        $this->_vote_option = $_vote_option;
    }

    public function getVoteOptionCount() {
        return $this->_vote_option_count;
    }

    public function setVoteOptionCount($_vote_option_count) {
        $this->_vote_option_count = $_vote_option_count;
    }

    /**
     *
     * @return \WDS\Model\Entity\Votes
     */
    public function getVote() {
        return $this->_vote;
    }

    public function setVote($_vote) {
        $this->_vote = $_vote;
    }


    
}
