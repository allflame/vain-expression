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
namespace Vain\Expression\Math\Plus;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Math\MathExpressionInterface;

/**
 * Class PlusExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PlusExpression extends AbstractBinaryExpression implements MathExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['plus' => parent::toArray()];
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
        return sprintf('%s + %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}