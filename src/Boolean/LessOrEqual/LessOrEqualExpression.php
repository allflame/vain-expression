<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Boolean\LessOrEqual;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class LessOrEqualExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->lte($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s <= %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}