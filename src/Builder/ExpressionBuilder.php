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

namespace Vain\Expression\Builder;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\Mode\ModeExpression;
use Vain\Expression\Terminal\TerminalExpression;

/**
 * Class ExpressionBuilder
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ExpressionBuilder
{
    private $type;

    private $module;

    private $value;

    private $mode;

    private $chain = [];

    private $expressionFactory;

    /**
     * ExpressionBuilder constructor.
     *
     * @param ExpressionFactoryInterface $expressionFactory
     */
    public function __construct(ExpressionFactoryInterface $expressionFactory)
    {
        $this->expressionFactory = $expressionFactory;
    }

    /**
     * @param string $mode
     *
     * @return ExpressionBuilder
     */
    public function mode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function int() : ExpressionBuilder
    {
        $this->mode = 'int';

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function string() : ExpressionBuilder
    {
        $this->mode = 'string';

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function float() : ExpressionBuilder
    {
        $this->mode = 'float';

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function bool() : ExpressionBuilder
    {
        $this->mode = 'bool';

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return ExpressionBuilder
     */
    public function inPlace($value) : ExpressionBuilder
    {
        $this->type = 'in_place';
        $this->value = $value;

        return $this;
    }

    /**
     * @param string $method
     * @param array  $arguments
     *
     * @return ExpressionBuilder
     */
    public function method(string $method, array $arguments = []) : ExpressionBuilder
    {
        $this->chain[] = ['method', [$method, $arguments]];

        return $this;
    }

    /**
     * @param string $module
     *
     * @return ExpressionBuilder
     */
    public function module(string $module) : ExpressionBuilder
    {
        $this->type = 'module';
        $this->module = $module;

        return $this;
    }

    /**
     * @param string $property
     *
     * @return ExpressionBuilder
     */
    public function property(string $property) : ExpressionBuilder
    {
        $this->chain[] = ['property', $property];

        return $this;
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return ExpressionBuilder
     */
    public function func(string $name, array $arguments = []) : ExpressionBuilder
    {
        $this->chain[] = ['function', [$name, $arguments]];

        return $this;
    }

    /**
     * @param ExpressionInterface $expression
     *
     * @return ExpressionBuilder
     */
    public function filter(ExpressionInterface $expression) : ExpressionBuilder
    {
        $this->chain[] = ['filter', $expression];

        return $this;
    }

    /**
     * @param BooleanExpressionInterface $expression
     *
     * @return BooleanExpressionInterface
     */
    public function not(BooleanExpressionInterface $expression) : BooleanExpressionInterface
    {
        return $this->expressionFactory->not($expression);
    }

    /**
     * @param BooleanExpressionInterface $expression
     *
     * @return BooleanExpressionInterface
     */
    public function id(BooleanExpressionInterface $expression) : BooleanExpressionInterface
    {
        return $this->expressionFactory->id($expression);
    }

    /**
     * @param BooleanExpressionInterface $first
     * @param BooleanExpressionInterface $second
     *
     * @return BooleanExpressionInterface
     */
    public function orX(
        BooleanExpressionInterface $first,
        BooleanExpressionInterface $second
    ) : BooleanExpressionInterface
    {
        return $this->expressionFactory->orX($first, $second);
    }

    /**
     * @param BooleanExpressionInterface $first
     * @param BooleanExpressionInterface $second
     *
     * @return BooleanExpressionInterface
     */
    public function andX(
        BooleanExpressionInterface $first,
        BooleanExpressionInterface $second
    ) : BooleanExpressionInterface
    {
        return $this->expressionFactory->andX($first, $second);
    }

    /**
     * @param string $class
     * @param string $method
     * @param array  $arguments
     *
     * @return ExpressionBuilder
     */
    public function helper(string $class, string $method, array $arguments = []) : ExpressionBuilder
    {
        $this->chain[] = ['helper', [$class, $method, $arguments]];

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function context() : ExpressionBuilder
    {
        $this->type = 'context';

        return $this;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression() : ExpressionInterface
    {
        switch ($this->type) {
            case 'in_place':
                $expression = $this->expressionFactory->terminal($this->value);
                break;
            default:
                $expression = $this->expressionFactory->context();
        }
        foreach ($this->chain as $element) {
            list ($type, $value) = $element;
            switch ($type) {
                case 'property':
                    $properties = explode('.', $value);
                    foreach ($properties as $property) {
                        $expression = $this->expressionFactory->property(
                            $expression,
                            new TerminalExpression($property)
                        );
                    }
                    break;
                case 'method':
                    list ($name, $arguments) = $value;
                    $methods = explode('.', $name);
                    foreach ($methods as $method) {
                        $expression = $this->expressionFactory->method(
                            $expression,
                            new TerminalExpression($method),
                            new ModeExpression(
                                new TerminalExpression($arguments),
                                new TerminalExpression('array')
                            )
                        );
                    }
                    break;
                case 'function':
                    list ($name, $arguments) = $value;
                    $expression = $this->expressionFactory->func(
                        $expression,
                        new TerminalExpression($name),
                        new ModeExpression(
                            new TerminalExpression($arguments),
                            new TerminalExpression('array')
                        )
                    );
                    break;
                case 'filter':
                    $expression = $this->expressionFactory->filter($expression, $value);
                    break;
                case 'helper':
                    list ($class, $method, $arguments) = $value;
                    $expression = $this->expressionFactory->helper(
                        $expression,
                        new TerminalExpression($class),
                        new TerminalExpression($method),
                        new ModeExpression(
                            new TerminalExpression($arguments),
                            new TerminalExpression('array')
                        )
                    );
                    break;
            }
        }
        if (null !== $this->mode) {
            $expression = $this->expressionFactory->mode($expression, new TerminalExpression($this->mode));
        }
        $this->type = $this->value = $this->module = $this->mode = null;
        $this->chain = [];

        return $expression;
    }
}