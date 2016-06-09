<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:42 AM
 */

namespace Vain\Expression\Boolean\Greater;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class GreaterExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->gt($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s > %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}