<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:15 AM
 */

namespace Vain\Expression\Boolean\OrX;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class OrExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->orX($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('(%s OR %s)', $this->getFirstExpression(), $this->getSecondExpression());
    }
}