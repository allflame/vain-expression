<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/6/16
 * Time: 12:28 PM
 */

namespace Vain\Expression\Visitor;

interface VisitableInterface
{
    /**
     * @param VisitorInterface $visitor
     * 
     * @return mixed
     */
    public function accept(VisitorInterface $visitor);
}