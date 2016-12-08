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

namespace Vain\Expression\Decorator;

use Vain\Expression\ExpressionInterface;

/**
 * Class AbstractExpressionDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractExpressionDecorator implements ExpressionInterface
{
    private $expression;

    /**
     * AbstractVainExpressionDecorator constructor.
     *
     * @param ExpressionInterface $expression
     */
    public function __construct(ExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression() : ExpressionInterface
    {
        return $this->expression;
    }
}
