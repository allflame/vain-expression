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

namespace Vain\Expression\Conditional\IfX;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Ternary\AbstractTernaryExpression;

/**
 * Class IfExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class IfExpression extends AbstractTernaryExpression
{
    /**
     * IfExpression constructor.
     *
     * @param BooleanExpressionInterface $condition
     * @param ExpressionInterface        $then
     * @param ExpressionInterface        $else
     */
    public function __construct(
        BooleanExpressionInterface $condition,
        ExpressionInterface $then,
        ExpressionInterface $else
    ) {
        parent::__construct($condition, $then, $else);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        if ($this->getFirstExpression()->interpret($context)->getStatus()) {
            return $this->getSecondExpression()->interpret($context);
        }

        return $this->getThirdExpression()->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return sprintf(
            'if (%s) then (%s) else (%s)',
            $this->getFirstExpression(),
            $this->getSecondExpression(),
            $this->getThirdExpression()
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['if' => parent::toArray()];
    }
}
