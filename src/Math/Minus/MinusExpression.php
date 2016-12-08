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
declare(strict_types = 1);

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
    public function toArray() : array
    {
        return ['minus' => parent::toArray()];
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getFirstExpression()->interpret($context) - $this->getSecondExpression()->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return sprintf('%s - %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}
