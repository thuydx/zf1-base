<?php

/**
 * WDS GROUP
 *
 * @name        Types.php
 * @category    Entity
 * @package     WDS/Model/Entity
 * @subpackage  File
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

namespace WDS\Model\Entity\File;

/**
 * @Entity 
 * @Table(name="file_types")
 */
class Types {

    //`file_type_id`, `file_type_name`, `file_type_extension`, `file_type_minetype`, `path_prefix`
    /**
     * @Id
     * @Column(name="`file_type_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_file_type_id;

    /**
     * @Column(name="`file_type_name`", type="string", length=45)
     * @var string
     */
    private $_file_type_name;

    /**
     * @Column(name="`file_type_extension`", type="string", length=3)
     * @var string
     */
    private $_file_type_extension;

    /**
     * @Column(name="`file_type_minetype`", type="string", length=255)
     * @var string
     */
    private $_file_type_minetype;

    /**
     * @Column(name="`path_prefix`", type="string", length=255)
     * @var string
     */
    private $_path_prefix;
    
    /**
     * @OneToMany(targetEntity="\WDS\Model\Entity\Files", mappedBy="_file_types")
     */
    private $_files;
    
    public function getFile_type_id() {
        return $this->_file_type_id;
    }

    public function setFile_type_id($_file_type_id) {
        $this->_file_type_id = $_file_type_id;
    }

    public function getFile_type_name() {
        return $this->_file_type_name;
    }

    public function setFile_type_name($_file_type_name) {
        $this->_file_type_name = $_file_type_name;
    }

    public function getFile_type_extension() {
        return $this->_file_type_extension;
    }

    public function setFile_type_extension($_file_type_extension) {
        $this->_file_type_extension = $_file_type_extension;
    }

    public function getFile_type_minetype() {
        return $this->_file_type_minetype;
    }

    public function setFile_type_minetype($_file_type_minetype) {
        $this->_file_type_minetype = $_file_type_minetype;
    }

    public function getPath_prefix() {
        return $this->_path_prefix;
    }

    public function setPath_prefix($_path_prefix) {
        $this->_path_prefix = $_path_prefix;
    }

    /**
     *
     * @return array \WDS\Model\Entity\Files
     */
    public function getFiles() {
        return $this->_files;
    }

    public function setFiles($_files) {
        $this->_files = $_files;
    }



}
