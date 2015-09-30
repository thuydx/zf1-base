<?php
//use \WDS\Model\Business\Categories;
class Cms_IndexController extends \Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $request = $this->getRequest();

        echo ' ---- Admin CP ----';
        $roleObj = new \WDS\Model\Business\Roles();
        $data = $roleObj->getPartName();
        echo '<pre>';
        var_dump($data);
        echo '</pre>'; die();
        die ();
//        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
//        $config     = Zend_Controller_Front::getInstance()
//                            ->getParam('bootstrap')->getOptions();   
//        $params =  $this->getRequest()->getParams();            
//        echo '<pre>';
//        var_dump($params);
//        echo '</pre>'; die();
        echo 'default module - index action';// action body
           $data = new \WDS\Model\Business\Categories();
           $value = array('category_visit'=>10,'category_icon' => 'icon','content_count'=>10);
            $em = Zend_Registry::get('em');
            $query = $em->createQueryBuilder()
                ->update('WDS\Model\Entity\Categories','cat')//ko can as cung duoc anh ak
                ->set('cat._category_visit','?1')
                ->set('cat._category_icon','?2')
                ->set('cat._content_count','?3')
                ->where('cat._category_id = :catid')
                ->setParameter(1, 10) 
                ->setParameter(2, 'icon') 
                ->setParameter(3, 10) 
                ->setParameter('catid', 2);
            $dql = $query->getQuery();            
            $result = $dql->execute();
    }


}

