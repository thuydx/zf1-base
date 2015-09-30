<?php
/**
 * WDS GROUP
 *
 * @name        Database.php
 * @category    WDS
 * @package     Controller/Plugin
 * @subpackage  Debug/Plugin
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 8:35:23 PM - 2011
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

require_once 'Zend/Db/Table/Abstract.php';

/**
 * WDS GROUP
 *
 * @name        Database.php
 * @category    WDS
 * @package     Controller/Plugin
 * @subpackage  Debug/Plugin
 * @author      Thuy Dinh Xuan <thuydx@wds.vn>
 * @copyright   Copyright (c)2008-2010 WDS GROUP. All rights reserved
 * @license     http://wds.vn/license/     WDS Software License
 * @version     $1.0$
 * 8:35:23 PM - 2011
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

class WDS_Controller_Plugin_Debug_Plugin_Database
    extends WDS_Controller_Plugin_Debug_Plugin
    implements WDS_Controller_Plugin_Debug_Plugin_Interface
{

    /**
     * Contains plugin identifier name
     *
     * @var string
     */
    protected $_identifier = 'database';

    /**
     * @var array
     */
    protected $_db = array();

    protected $_explain = false;

    /**
     * Create WDS_Controller_Plugin_Debug_Plugin_Variables
     *
     * @param Zend_Db_Adapter_Abstract|array $adapters
     * @return void
     */
    public function __construct(array $options = array())
    {

        $dns = 'mongodb://';
        $options = array();
        if (isset($this->_params['dbname'])) {
            if (!empty($this->_params['username']) && !empty($this->_params['password'])) {
                //$dns .= $this->_params['username'];
                if(!empty($this->_params['password'])){
                    $options['username'] = $this->_params['username'];
                    $options['password'] = $this->_params['password'];
                    //$dns .= ':' . $this->_params['password'];
                }
                //$dns .=  '@';
            }

            if (isset($this->_params['hostname'])) {
                $dns .= $this->_params['hostname'];
            }

            if (isset($this->_params['port'])) {
                $dns .= ':' . $this->_params['port'];
            }
            #$dns .= '/' . $this->_params['dbname'];
            $options['db'] = $this->_params['dbname'];
        } else {
            throw new Exception(__CLASS__ . ' is missing parameters.');
        }

        try {
            #print_r( $options);die();
            for($i = 0; $i < 10; $i++) {
                try {
                    $connection = new MongoClient($dns);
                    $db =  $connection->selectDB($this->_params['dbname']);

                    break;

                } catch (Exception $e) {
                    if($i < 9) {
                        continue;
                    } else {
                        throw $e;
                    }
                }
            }
            $thÍs->_dbơ[] = $db;
        } catch (MongoConnectionException $e) {
            throw new Exception($e->getMessage());
        }



        if (!isset($options['adapter']) || !count($options['adapter'])) {
            if (Zend_Db_Table_Abstract::getDefaultAdapter()) {
                $this->_db[0] = Zend_Db_Table_Abstract::getDefaultAdapter();
                $this->_db[0]->getProfiler()->setEnabled(true);
            }
        } else if ($options['adapter'] instanceof Zend_Db_Adapter_Abstract ) {
            $this->_db[0] = $options['adapter'];
            $this->_db[0]->getProfiler()->setEnabled(true);
        } else {
            foreach ($options['adapter'] as $name => $adapter) {
                if ($adapter instanceof Zend_Db_Adapter_Abstract) {
                    $adapter->getProfiler()->setEnabled(true);
                    $this->_db[$name] = $adapter;
                }
            }
        }

        if (isset($options['explain'])) {
            $this->_explain = (bool)$options['explain'];
        }
    }

    /**
     * Gets identifier for this plugin
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->_identifier;
    }

    /**
     * Returns the base64 encoded icon
     *
     * @return string
     **/
    public function getIconData()
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAEYSURBVBgZBcHPio5hGAfg6/2+R980k6wmJgsJ5U/ZOAqbSc2GnXOwUg7BESgLUeIQ1GSjLFnMwsKGGg1qxJRmPM97/1zXFAAAAEADdlfZzr26miup2svnelq7d2aYgt3rebl585wN6+K3I1/9fJe7O/uIePP2SypJkiRJ0vMhr55FLCA3zgIAOK9uQ4MS361ZOSX+OrTvkgINSjS/HIvhjxNNFGgQsbSmabohKDNoUGLohsls6BaiQIMSs2FYmnXdUsygQYmumy3Nhi6igwalDEOJEjPKP7CA2aFNK8Bkyy3fdNCg7r9/fW3jgpVJbDmy5+PB2IYp4MXFelQ7izPrhkPHB+P5/PjhD5gCgCenx+VR/dODEwD+A3T7nqbxwf1HAAAAAElFTkSuQmCC';
    }

    /**
     * Gets menu tab for the Debugbar
     *
     * @return string
     */
    public function getTab()
    {
        if (!$this->_db)
            return 'No adapter';

        foreach ($this->_db as $adapter) {
            $profiler = $adapter->getProfiler();
            $adapterInfo[] = $profiler->getTotalNumQueries() . ' in '
                           . round($profiler->getTotalElapsedSecs()*1000, 2) . ' ms';
        }
        $html = implode(' / ', $adapterInfo);

        return $html;
    }

    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        if (!$this->_db)
            return '';

        $html = '<h4>Database queries';

        // @TODO: This is always on?
        if (Zend_Db_Table_Abstract::getDefaultMetadataCache()) {
            $html .= ' – Metadata cache ENABLED';
        } else {
            $html .= ' – Metadata cache DISABLED';
        }
        $html .= '</h4>';

        return $html . $this->getProfile();
    }

    public function getProfile()
    {
        $queries = '';
        foreach ($this->_db as $name => $adapter) {
            if ($profiles = $adapter->getProfiler()->getQueryProfiles()) {
                $adapter->getProfiler()->setEnabled(false);
                if (1 < count($this->_db)) {
                    $html .= '<h4>Adapter '.$name.'</h4>';
                }
                $queries .='<table cellspacing="0" cellpadding="0" width="100%">';
                foreach ($profiles as $profile) {
                    $queries .= "<tr>\n<td style='text-align:right;padding-right:2em;' nowrap>\n"
                           . sprintf('%0.2f', $profile->getElapsedSecs()*1000)
                           . "ms</td>\n<td>";
                    $params = $profile->getQueryParams();
                    array_walk($params, array($this, '_addQuotes'));
                    $paramCount = count($params);
                    if ($paramCount) {
                        $queries .= htmlspecialchars(preg_replace(array_fill(0, $paramCount, '/\?/'), $params, $profile->getQuery(), 1));
                    } else {
                        $queries .= htmlspecialchars($profile->getQuery());
                    }

                    $supportedAdapter = ($adapter instanceof Zend_Db_Adapter_Mysqli ||
                                         $adapter instanceof Zend_Db_Adapter_Pdo_Mysql);

                    # Run explain if enabled, supported adapter and SELECT query
                    if ($this->_explain && $supportedAdapter) {
                        $queries .= "</td><td style='color:#7F7F7F;padding-left:2em;' nowrap>";

                        foreach ($adapter->fetchAll('EXPLAIN '.$profile->getQuery()) as $explain) {
                            $queries .= "<div style='padding-bottom:0.5em'>";
                            $explainData = array(
                                'Type' => $explain['select_type'] . ', ' . $explain['type'],
                                'Table' => $explain['table'],
                                'Possible keys' => str_replace(',', ', ', $explain['possible_keys']),
                                'Key used' => $explain['key'],
                            );
                            if ($explain['Extra']) {
                                $explainData['Extra'] = $explain['Extra'];
                            }
                            $explainData['Rows'] = $explain['rows'];

                            $explainEnd = end($explainData);
                            foreach ($explainData as $key => $value) {
                                $queries .= "$key: <span style='color:#ffb13e'>$value</span><br>\n";
                            }
                            $queries .= "</div>";
                        }
                    }

                    $queries .= "</td>\n</tr>\n";
                }
                $queries .= "</table>\n";
            }
        }
        return $queries;
    }

    // For adding quotes to query params
    protected function _addQuotes(&$value, $key)
    {
        $value = "'" . $value . "'";
    }
}
