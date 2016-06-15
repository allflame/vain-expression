<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:08 AM
 */

namespace Vain\Expression\Boolean\Unary\Identity;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Unary\AbstractUnaryExpression;

class IdentityExpression extends AbstractUnaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()->id($this, $this->getExpression()->interpret($context));
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('(%s)', $this->getExpression());
    }
}