<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:20 AM
 */

namespace Vain\Expression\Boolean\True;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;
use Vain\Expression\ZeroAry\AbstractZeroAryExpression;

class TrueExpression extends AbstractZeroAryExpression implements BooleanExpressionInterface
{

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->true($this);
    }
}