<?php
/**
 * WDS Project - WDS
 * @name GetNews
 * @package WDS/View/Helper
 * @author Thuy Dinh Xuan
 * @version $1.0.1$
 * 11:50:04 PM - Aug 13, 2010
 * License http://wds.vn/license
 */
 
 

require_once('Zend/View/Helper/Abstract.php');

class WDS_View_Helper_GetNews extends \Zend_View_Helper_Abstract
{
    public function GetNews($uri, $caching = false)
    {
        $html = '';

        if ($caching) {
            $cache = WDS::initCache('GetNews',WEB_ROOT . '/data/cache');
            $id = $cache->id . WDS::initLocale();
            $html = $cache->load($id);
            if(false == $html) {
                $html = $this->Import($uri);
                $cache->save($html, $id, $cache->tags);
            }
        } else {
            $html = $this->Import($uri);
        }

        return $html;
    }

    public function Import($uri)
    {
        $html = '';

        $atom = Zend_Feed::import($uri);

        $html .= '<div>';
        //$html .= $atom->id();
        $html .= $this->view->link($atom->link(0), $atom->title(), true);
        $html .= ' - ' . $atom->subtitle();
        $html .= $atom->author->name();
        $html .= $atom->author->email();
        $html .= '</div>';

        $html .= '<br /><br />';

        foreach ($atom as $item) {
            //print_r($item);die;

            $html .= '<div>';
            $html .= $this->view->link($item->link(0), $item->title(), true);

            if ($item->author()) {
                $html .= ' by ' . $item->author();
            }

            //$html .= ' - ' . $this->view->date($item->published());
            //$html .= $item->updated();

            $html .= '</div>';

            //$html .= '<div>' . $item->id() . '</div>';
            //$html .= '<div>' . $item->summary() . '</div>';
            //$html .= '<div>' . $item->content() . '</div>';

            /*
            foreach ($item->link() as $link) {
                //$html .= '<div> -- ' . $link . '</div>';
            }
            */

            $html .= '<br />';
        }

        return $html;
    }
}