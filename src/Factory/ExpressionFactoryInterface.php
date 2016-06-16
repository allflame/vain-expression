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
namespace Vain\Expression\Factory;

use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\Context\ContextExpression;
use Vain\Expression\NonTerminal\Filter\FilterExpression;
use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;
use Vain\Expression\NonTerminal\Helper\HelperExpression;
use Vain\Expression\NonTerminal\Method\MethodExpression;
use Vain\Expression\NonTerminal\Mode\ModeExpression;
use Vain\Expression\NonTerminal\Property\PropertyExpression;
use Vain\Expression\Terminal\TerminalExpression;

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
     * @return IdentityExpression
     */
    public function id(BooleanExpressionInterface $expression);

    /**
     * @param BooleanExpressionInterface $expression
     *
     * @return NotExpression
     */
    public function not(BooleanExpressionInterface $expression);

    /**
     * @return FalseExpression
     */
    public function false();

    /**
     * @return TrueExpression
     */
    public function true();

    /**
     * @param BooleanExpressionInterface $firstExpression
     * @param BooleanExpressionInterface $secondExpression
     *
     * @return AndExpression
     */
    public function andX(BooleanExpressionInterface $firstExpression, BooleanExpressionInterface $secondExpression);

    /**
     * @param BooleanExpressionInterface $firstExpression
     * @param BooleanExpressionInterface $secondExpression
     *
     * @return OrExpression
     */
    public function orX(BooleanExpressionInterface $firstExpression, BooleanExpressionInterface $secondExpression);

    /**
     * @param mixed $value
     *
     * @return TerminalExpression
     */
    public function terminal($value);

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     *
     * @return MethodExpression
     */
    public function method(
        ExpressionInterface $expression,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    );

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $property
     *
     * @return PropertyExpression
     */
    public function property(ExpressionInterface $expression, ExpressionInterface $property);

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $functionName
     * @param ExpressionInterface $arguments
     *
     * @return FunctionExpression
     */
    public function func(
        ExpressionInterface $expression,
        ExpressionInterface $functionName,
        ExpressionInterface $arguments = null
    );

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $mode
     *
     * @return ModeExpression
     */
    public function mode(ExpressionInterface $expression, ExpressionInterface $mode);

    /**
     * @param ExpressionInterface        $expression ,
     * @param BooleanExpressionInterface $filterExpression
     *
     * @return FilterExpression
     */
    public function filter(ExpressionInterface $expression, BooleanExpressionInterface $filterExpression);

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $class
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     *
     * @return HelperExpression
     */
    public function helper(
        ExpressionInterface $expression,
        ExpressionInterface $class,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    );

    /**
     * @return ContextExpression
     */
    public function context();
}