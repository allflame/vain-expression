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

namespace Vain\Expression\Factory;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\ExpressionInterface;

/**
 * Interface ExpressionFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ExpressionFactoryInterface
{
    /**
     * @param BooleanExpressionInterface $expression
     *
     * @return BooleanExpressionInterface
     */
    public function id(BooleanExpressionInterface $expression) : BooleanExpressionInterface;

    /**
     * @param BooleanExpressionInterface $expression
     *
     * @return BooleanExpressionInterface
     */
    public function not(BooleanExpressionInterface $expression) : BooleanExpressionInterface;

    /**
     * @return BooleanExpressionInterface
     */
    public function false() : BooleanExpressionInterface;

    /**
     * @return BooleanExpressionInterface
     */
    public function true() : BooleanExpressionInterface;

    /**
     * @param BooleanExpressionInterface $firstExpression
     * @param BooleanExpressionInterface $secondExpression
     *
     * @return BooleanExpressionInterface
     */
    public function andX(
        BooleanExpressionInterface $firstExpression,
        BooleanExpressionInterface $secondExpression
    ) : BooleanExpressionInterface;

    /**
     * @param BooleanExpressionInterface $firstExpression
     * @param BooleanExpressionInterface $secondExpression
     *
     * @return BooleanExpressionInterface
     */
    public function orX(
        BooleanExpressionInterface $firstExpression,
        BooleanExpressionInterface $secondExpression
    ) : BooleanExpressionInterface;

    /**
     * @param mixed $value
     *
     * @return ExpressionInterface
     */
    public function terminal($value) : ExpressionInterface;

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     *
     * @return ExpressionInterface
     */
    public function method(
        ExpressionInterface $expression,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    ) : ExpressionInterface;

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $property
     *
     * @return ExpressionInterface
     */
    public function property(ExpressionInterface $expression, ExpressionInterface $property) : ExpressionInterface;

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $functionName
     * @param ExpressionInterface $arguments
     *
     * @return ExpressionInterface
     */
    public function func(
        ExpressionInterface $expression,
        ExpressionInterface $functionName,
        ExpressionInterface $arguments = null
    ) : ExpressionInterface;

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $mode
     *
     * @return ExpressionInterface
     */
    public function mode(ExpressionInterface $expression, ExpressionInterface $mode) : ExpressionInterface;

    /**
     * @param ExpressionInterface        $expression ,
     * @param BooleanExpressionInterface $filterExpression
     *
     * @return ExpressionInterface
     */
    public function filter(
        ExpressionInterface $expression,
        BooleanExpressionInterface $filterExpression
    ) : ExpressionInterface;

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $class
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     *
     * @return ExpressionInterface
     */
    public function helper(
        ExpressionInterface $expression,
        ExpressionInterface $class,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    ) : ExpressionInterface;

    /**
     * @return ExpressionInterface
     */
    public function context() : ExpressionInterface;
}
