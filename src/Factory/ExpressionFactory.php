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

use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Context\ContextExpression;
use Vain\Expression\Filter\FilterExpression;
use Vain\Expression\FunctionX\FunctionExpression;
use Vain\Expression\Helper\HelperExpression;
use Vain\Expression\Method\MethodExpression;
use Vain\Expression\Mode\ModeExpression;
use Vain\Expression\Property\PropertyExpression;
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
    public function id(BooleanExpressionInterface $expression) : BooleanExpressionInterface
    {
        return new IdentityExpression($expression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function not(BooleanExpressionInterface $expression) : BooleanExpressionInterface
    {
        return new NotExpression($expression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function false() : BooleanExpressionInterface
    {
        return new FalseExpression($this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function true() : BooleanExpressionInterface
    {
        return new TrueExpression($this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function andX(
        BooleanExpressionInterface $firstExpression,
        BooleanExpressionInterface $secondExpression
    ) : BooleanExpressionInterface
    {
        return new AndExpression($firstExpression, $secondExpression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function orX(
        BooleanExpressionInterface $firstExpression,
        BooleanExpressionInterface $secondExpression
    ) : BooleanExpressionInterface
    {
        return new OrExpression($firstExpression, $secondExpression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function terminal($value) : ExpressionInterface
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
    ) : ExpressionInterface
    {
        return new MethodExpression($data, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function property(ExpressionInterface $data, ExpressionInterface $property) : ExpressionInterface
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
    ) : ExpressionInterface
    {
        return new FunctionExpression($data, $function, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function mode(ExpressionInterface $data, ExpressionInterface $mode) : ExpressionInterface
    {
        return new ModeExpression($data, $mode);
    }

    /**
     * @inheritDoc
     */
    public function filter(ExpressionInterface $data, BooleanExpressionInterface $filter) : ExpressionInterface
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
    ) : ExpressionInterface
    {
        return new HelperExpression($data, $class, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function context() : ExpressionInterface
    {
        return new ContextExpression();
    }
}