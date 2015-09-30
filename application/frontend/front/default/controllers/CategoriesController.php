<?php

class CategoriesController extends Zend_Controller_Action {
    /**
     *
     * @var \Doctrine\ORM\EntityManager 
     */
    protected $em = null;
    
    public function init() {
        $this->_helper->ViewRenderer->setNoRender(true);
        $this->em = Zend_Registry::get('em');
    }
    
    public function indexAction()
    {                
        echo 'Xem danh sach categories: <a href="/categories/categories">Click here</a><br />';
        echo 'Xem danh sach categories details: <a href="/categories/detail">Click here</a><br />';
        echo 'Xem danh sach categories associations: <a href="/categories/associations">Click here</a><br />';
    }
    
    public function associationsAction()
    {                
        $qb = $this->em->createQueryBuilder()
                ->select('cat')
                ->from('\WDS\Model\Entity\Category\Associations','cat');
        $query = $qb->getQuery();
        
        $data = $query->getResult();
        
        foreach ($data as $row) {
            if ($row instanceof \WDS\Model\Entity\Category\Associations) {
                //echo $row->get_category_id() . ' - ' . $row->get_category_icon() . '<br />';                
                echo $row->get_category_association_id() . '<br />';
            }
        }
        
    }
    
    
    public function detailAction()
    {                
        $qb = $this->em->createQueryBuilder()
                ->select('cat')
                ->from('\WDS\Model\Entity\Category\Detail','cat');
        $query = $qb->getQuery();
        
        $data = $query->getResult();
        
        foreach ($data as $row) {
            if ($row instanceof \WDS\Model\Entity\Category\Detail) {                
                echo $row->get_general_url() . '<br />';
            }
        }
        
    }
    
    public function categoriesAction()
    {                
        $qb = $this->em->createQueryBuilder()
                ->select('cat')
                ->from('\WDS\Model\Entity\Categories','cat');
        $query = $qb->getQuery();
        
        $data = $query->getResult();
        
        foreach ($data as $row) {
            if ($row instanceof \WDS\Model\Entity\Categories) {
                echo $row->get_category_id() . ' - ' . $row->get_category_icon() . '<br />';                
                echo '&nbsp;&nbsp;&nbsp;&nbsp;<b>category_associations</b><br />';
                foreach ($row->get_category_associations() as $associations) {
                    if ($associations instanceof \WDS\Model\Entity\Category\Associations) {
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $associations->get_category_association_id() . '<br />';
                    }
                }
                if (count($row->get_category_detail()) > 0) {
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;<b>category_detail</b><br />';
                    foreach ($row->get_category_detail() as $detail) {
                        if ($detail instanceof \WDS\Model\Entity\Category\Detail) {
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $detail->get_general_url() . '<br />';
                        }
                    }
                }
            }
        }
        
    }
    
}
