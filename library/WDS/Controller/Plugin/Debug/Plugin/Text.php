<?php
/**
 * WDS GROUP
 *
 * @name        Text.php
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
class WDS_Controller_Plugin_Debug_Plugin_Text implements WDS_Controller_Plugin_Debug_Plugin_Interface
{
    /**
     * @var string
     */
    protected $_tab = '';

    /**
     * @var string
     */
    protected $_panel = '';

    /**
     * Contains plugin identifier name
     *
     * @var string
     */
    protected $_identifier = 'text';
    
    /**
     * Contains plugin icon data
     *
     * @var string
     */
    protected $_icondata = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHhSURBVDjLpZI9SJVxFMZ/r2YFflw/kcQsiJt5b1ije0tDtbQ3GtFQYwVNFbQ1ujRFa1MUJKQ4VhYqd7K4gopK3UIly+57nnMaXjHjqotnOfDnnOd/nt85SURwkDi02+ODqbsldxUlD0mvHw09ubSXQF1t8512nGJ/Uz/5lnxi0tB+E9QI3D//+EfVqhtppGxUNzCzmf0Ekojg4fS9cBeSoyzHQNuZxNyYXp5ZM5Mk1ZkZT688b6thIBenG/N4OB5B4InciYBCVyGnEBHO+/LH3SFKQuF4OEs/51ndXMXC8Ajqknrcg1O5PGa2h4CJUqVES0OO7sYevv2qoFBmJ/4gF4boaOrg6rPLYWaYiVfDo0my8w5uj12PQleB0vcp5I6HsHAUoqUhR29zH+5B4IxNTvDmxljy3x2YCYUwZVlbzXJh9UKeQY6t2m0Lt94Oh5loPdqK3EkjzZi4MM/Y9Db3MTv/mYWVxaqkw9IOATNR7B5ABHPrZQrtg9sb8XDKa1+QOwsri4zeHD9SAzE1wxBTXz9xtvMc5ZU5lirLSKIz18nJnhOZjb22YKkhd4odg5icpcoyL669TAAujlyIvmPHSWXY1ti1AmZ8mJ3ElP1ips1/YM3H300g+W+51nc95YPEX8fEbdA2ReVYAAAAAElFTkSuQmCC';

    /**
     * Create WDS_Controller_Plugin_Debug_Plugin_Text
     *
     * @param string $tab
     * @paran string $panel
     * @return void
     */
    public function __construct(array $options = array())
    {
        if (isset($options['tab'])) {
            $this->setTab($options['tab']);
        }
        if (isset($options['panel'])) {
            $this->setPanel($options['panel']);
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
     * Sets identifier for this plugin
     *
     * @param string $name
     * @return WDS_Controller_Plugin_Debug_Plugin_Text Provides a fluent interface
     */
    public function setIdentifier($name)
    {
        $this->_identifier = $name;
        return $this;
    }
    
    /**
     * Returns the base64 encoded icon
     *
     * @return string
     **/
    public function getIconData()
    {
        return $this->_icondata;
    }

    /**
     * Sets icon data for this plugin
     *
     * @param string $data
     * @return WDS_Controller_Plugin_Debug_Plugin_Text Provides a fluent interface
     */
    public function setIconData($data)
    {
        $this->_icondata = $data;
        return $this;
    }

    /**
     * Gets menu tab for the Debugbar
     *
     * @return string
     */
    public function getTab()
    {
        return $this->_tab;
    }

    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        return $this->_panel;
    }

    /**
     * Sets tab content
     *
     * @param string $tab
     * @return WDS_Controller_Plugin_Debug_Plugin_Text Provides a fluent interface
     */
    public function setTab($tab)
    {
        $this->_tab = $tab;
        return $this;
    }

    /**
     * Sets panel content
     *
     * @param string $panel
     * @return WDS_Controller_Plugin_Debug_Plugin_Text Provides a fluent interface
     */
    public function setPanel($panel)
    {
        $this->_panel = $panel;
        return $this;
    }
}