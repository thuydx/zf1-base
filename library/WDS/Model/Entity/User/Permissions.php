<?php
/**
 * WDS GROUP
 *
 * @name        Permissions.php
 * @category    WDS
 * @package        
 * @subpackage           
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 10:29:44 PM - 2011
 *
 * LICENSE
 *
 * This source file is copyrighted by WDS GROUP, full details in LICENSE.txt.
 * It is also available through the Internet at this URL:
 * http://wds.vn/license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the Internet, please send an email
 * to license@wds.vn so we can send you a copy immediately.
 *
 */

namespace WDS\Model\Entity\User;

/**
 * @Entity 
 * @Table(name="user_pemissions")
 */
class Permissions {
    /**
     * @Id
     * @Column(name="`user_permission_id`", type="integer", length=11)
     * @GeneratedValue
     * @var int
     */
    private $_user_permission_id;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Roles", inversedBy="_role_user_permissions")
     * @JoinColumn(name="role_id", referencedColumnName="role_id")     
     */
    private $_roles;

    /**
     * @ManyToOne(targetEntity="\WDS\Model\Entity\Users", inversedBy="_user_permissions")
     * @JoinColumn(name="user_id", referencedColumnName="user_id")     
     */
    private $_users;    
}