<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:44 AM
 */

namespace Vain\Expression\Boolean\NotEqual;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class NotEqualExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->neq($this);
    }
}