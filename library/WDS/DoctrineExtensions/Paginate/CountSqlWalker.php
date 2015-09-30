<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CountSqlWalker
 * @author Ha Anh Man
 */
class WDS_DoctrineExtensions_Paginate_CountSqlWalker extends Doctrine\ORM\Query\TreeWalkerAdapter
{
    /**
     * Walks down a SelectStatement AST node, thereby generating the appropriate SQL.
     *
     * @return string The SQL.
     */
    public function walkSelectStatement(\Doctrine\ORM\Query\AST\SelectStatement $AST)
    {
        $parent = null;
        $parentName = null;
        foreach ($this->_getQueryComponents() AS $dqlAlias => $qComp) {
            if ($qComp['parent'] === null && $qComp['nestingLevel'] == 0) {
                $parent = $qComp;
                $parentName = $dqlAlias;
                break;
            }
        }
        
        $pathExpression = new \Doctrine\ORM\Query\AST\PathExpression(
            \Doctrine\ORM\Query\AST\PathExpression::TYPE_STATE_FIELD | \Doctrine\ORM\Query\AST\PathExpression::TYPE_SINGLE_VALUED_ASSOCIATION, $parentName,
            $parent['metadata']->getSingleIdentifierFieldName()
        );
        $pathExpression->type = \Doctrine\ORM\Query\AST\PathExpression::TYPE_STATE_FIELD;

        $AST->selectClause->selectExpressions = array(        
            new \Doctrine\ORM\Query\AST\SelectExpression(            
                new Doctrine\ORM\Query\AST\AggregateExpression('count', $pathExpression, true), null
            )
        );
    }
}