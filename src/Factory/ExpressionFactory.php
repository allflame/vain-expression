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
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
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
 * Class ExpressionFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ExpressionFactory implements ExpressionFactoryInterface
{
    private $resultFactory;

    /**
     * ExpressionFactory constructor.
     *
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanResultFactoryInterface $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * @inheritDoc
     */
    public function id(BooleanExpressionInterface $expression)
    {
        return new IdentityExpression($expression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function not(BooleanExpressionInterface $expression)
    {
        return new NotExpression($expression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function false()
    {
        return new FalseExpression($this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function true()
    {
        return new TrueExpression($this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function andX(BooleanExpressionInterface $firstExpression, BooleanExpressionInterface $secondExpression)
    {
        return new AndExpression($firstExpression, $secondExpression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function orX(BooleanExpressionInterface $firstExpression, BooleanExpressionInterface $secondExpression)
    {
        return new OrExpression($firstExpression, $secondExpression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function terminal($value)
    {
        return new TerminalExpression($value);
    }

    /**
     * @inheritDoc
     */
    public function method(
        ExpressionInterface $data,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    ) {
        return new MethodExpression($data, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function property(ExpressionInterface $data, ExpressionInterface $property)
    {
        return new PropertyExpression($data, $property);
    }

    /**
     * @inheritDoc
     */
    public function func(
        ExpressionInterface $data,
        ExpressionInterface $function,
        ExpressionInterface $arguments = null
    ) {
        return new FunctionExpression($data, $function, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function mode(ExpressionInterface $data, ExpressionInterface $mode)
    {
        return new ModeExpression($data, $mode);
    }

    /**
     * @inheritDoc
     */
    public function filter(ExpressionInterface $data, BooleanExpressionInterface $filter)
    {
        return new FilterExpression($data, $filter);
    }

    /**
     * @inheritDoc
     */
    public function helper(
        ExpressionInterface $data,
        ExpressionInterface $class,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    ) {
        return new HelperExpression($data, $class, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function context()
    {
        return new ContextExpression();
    }
}