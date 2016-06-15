<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:10 AM
 */

namespace Vain\Expression\Boolean\Unary\Not;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Unary\AbstractUnaryExpression;

class NotExpression extends AbstractUnaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()->not($this, $this->getExpression()->interpret($context)->invert());
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('!%s', $this->getExpression());
    }
}