<?php

/**
 * WDS GROUP
 *
 * @name        Locale.php
 * @category    WDS
 * @package     WDS/Model
 * @subpackage  Business
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 10:16:07 AM - 2011
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

namespace WDS\Model\Business;

use \Doctrine\DBAL\DriverManager;

class Locale extends \WDS\Model\Business {
	/**
	* Protected attributes
	*/
    protected $_localeId;
    protected $_localeName;
    protected $_localeCode;
    protected $_localeDefault;
    protected $_em;
    /**
	* Get id
	*/
    public function getId()
    {
        return $this->getLocaleId();
    }

    public function setId($id)
    {
        return $this->setLocaleId($id);
    }

    /**
	* Get locale id
	*/
    public function getLocaleId()
    {
        return (int)$this->_localeId;
    }

    public function setLocaleId($id)
    {
        $this->_localeId = (int)$id;
        return $this;
    }

    /**
	* Get locale name
	*/
    public function getLocaleName()
    {
        return (string)$this->_localeName;
    }

    public function setLocaleName($string)
    {
        $this->_localeName = (string)$string;
        return $this;
    }

    /**
	* Get locale title
	*/
    public function getLocaleCode()
    {
        return (string)$this->_localeCode;
    }

    public function setLocaleCode($string)
    {
        $this->_localeCode = (string)$string;
        return $this;
    }

    /**
	* Get locale default setting
	*/
    public function getLocaleDefault()
    {
        return (bool)$this->_localeDefault ? 1 : 0;
    }

    public function setLocaleDefault($isDefault)
    {
        if ((bool)$isDefault == true) {
            $this->_localeDefault = 1;
        } else {
            $this->_localeDefault = 0;
        }
        return $this;
    }

	
	public function initLocale()
    {
        // Create Session for save locale
        $session = new \Zend_Session_Namespace('locale');

        // localeId = 1, 2 ...
        if (isset($session->localeId)) {

            // first we check the session
            $localeCode = $this->findLocale($session->localeId);
            if ($localeCode) {
                $locale = new \Zend_Locale($localeCode);
            } else {
                $locale = new \Zend_Locale('auto');
            }

        } else {

            $localeObjects = $this->getAll();

            $locale = new \Zend_Locale('auto');

            if (!empty($localeObjects)) {
                $noLocaleSpesific = true;
                foreach ($localeObjects['data'] as $data) {
                    if ($data->getLocaleCode() == $locale->toString()) {
                        $locale = new \Zend_Locale($data->getLocaleCode());
                        $session->localeId = $data->getLocaleId();
                        $noLocaleSpesific = false;
                    }
                    if ($data->getLocaleDefault()) {
                        $default = $data->getLocaleCode();
                        $defaultId = $data->getLocaleId();
                    }
                }
                // third we use the default one
                if ($noLocaleSpesific) {
                    $session->localeId = $defaultId;
                    $locale = new \Zend_Locale($default);
                }
            }
        }
        return $locale;
    }
    
    public function findLocale($localeId){
        
        $query = $this->_em->createQueryBuilder()
                ->select('e._locale_code')
                ->from('WDS\Model\Entity\Locale', 'e')
                ->where('e._locale_id = :localeId')
                ->setParameter('localeId', $localeId);
        $results = $query->getQuery()->getResult();        
        $localeCode = $results[0]['_locale_code'];
        
        if ($localeCode == null) {
            throw new \Zend_Exception('Locale width id . ' . $localeId . ' not exist');
        } else {
            $this->setLocaleCode($localeCode);
        }
        return $this->getLocaleCode();
        
    }

    /**
     * get all locale
     * @param int $offset
     * @param int $limit
     * @return array WDS\Model\Entity\Locale
     */
    public function getAll($offset = null, $limit = null) {
        $query = $this->_em->createQueryBuilder()
                ->select('e')
                ->from('WDS\Model\Entity\Locale', 'e')
                ->orderBy('e._locale_name', 'ASC');
        if ($offset != null && is_integer($offset)) {
            $query->setFirstResult($offset);
        }

        if ($limit != null && is_integer($limit)) {
            $query->setMaxResults($limit);
        }
        $results = array();
        $results['countRows'] = $this->getCountRow($query->getQuery());
        $results['data'] = $query->getQuery()->getResult();
        return $results;
    }

    /**
     * insert new locale
     * @param array $params
     */
    public function insert(array $params) {
        $entity = new \WDS\Model\Entity\Locale();
        $entity->setLocaleName($params['locale_name']);
        $entity->setLocaleCode($params['locale_code']);
        $entity->setLocaleDefault($params['locale_default']);
        $entity->setLocaleStatus($params['locale_status']);
        $this->_em->persist($entity);
        $this->_em->flush();        
    }
    
    /**
     * update locale
     * @param array $params
     * @param type $localeId
     */
    public function update(array $params, $localeId) {
        $entity = $this->findLocale($localeId);
        $entity->setLocaleName($params['locale_name']);
        $entity->setLocaleCode($params['locale_code']);
        $entity->setLocaleDefault($params['locale_default']);
        $entity->setLocaleStatus($params['locale_status']);
        $this->_em->persist($entity);
        $this->_em->flush();        
    }
    
    /**
     * delete locale with locale id
     * @param type $localeId
     */
    public function delete($localeId) {
        $entity = $this->findLocale($localeId);
        $this->_em->remove($entity);
        $this->_em->flush();    
    }    
}