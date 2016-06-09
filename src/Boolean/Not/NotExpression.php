<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:10 AM
 */

namespace Vain\Expression\Boolean\Not;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class NotExpression extends AbstractUnaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->not($this);
    }
}