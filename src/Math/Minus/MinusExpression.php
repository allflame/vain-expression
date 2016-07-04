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
namespace Vain\Expression\Math\Minus;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Math\MathExpressionInterface;

/**
 * Class MinusExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MinusExpression extends AbstractBinaryExpression implements MathExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['minus' => parent::toArray()];
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        trigger_error('Method interpret is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s - %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}