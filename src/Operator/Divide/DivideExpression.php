<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
namespace Vain\Expression\Operator\Divide;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Operator\OperatorExpressionInterface;

/**
 * Class DivideExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DivideExpression extends AbstractBinaryExpression implements OperatorExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['divide' => parent::toArray()];
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getFirstExpression()->interpret($context) + $this->getSecondExpression()->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s / %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}