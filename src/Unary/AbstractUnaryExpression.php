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

namespace Vain\Expression\Unary;

use Vain\Expression\ExpressionInterface;

/**
 * Class AbstractUnaryExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractUnaryExpression implements UnaryExpressionInterface
{
    private $expression;

    /**
     * AbstractUnaryExpression constructor.
     *
     * @param ExpressionInterface $expression
     */
    public function __construct(ExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    /**
     * @inheritDoc
     */
    public function getExpression() : ExpressionInterface
    {
        return $this->expression;
    }
}