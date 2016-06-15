<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 12:40 PM
 */

namespace Vain\Expression\Builder;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\Terminal\TerminalExpression;

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
    public function int()
    {
        $this->mode = 'int';

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function string()
    {
        $this->mode = 'string';

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function float()
    {
        $this->mode = 'float';

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function bool()
    {
        $this->mode = 'bool';

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return ExpressionBuilder
     */
    public function inPlace($value)
    {
        $this->type = 'in_place';
        $this->value = $value;

        return $this;
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return ExpressionBuilder
     */
    public function method($method, array $arguments = [])
    {
        $this->chain[] = ['method', [$method, $arguments]];

        return $this;
    }

    /**
     * @param string $module
     *
     * @return ExpressionBuilder
     */
    public function module($module)
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
    public function property($property)
    {
        $this->chain[] = ['property', $property];

        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return ExpressionBuilder
     */
    public function func($name, array $arguments = [])
    {
        $this->chain[] = ['function', [$name, $arguments]];

        return $this;
    }

    /**
     * @param ExpressionInterface $expression
     *
     * @return ExpressionBuilder
     */
    public function filter(ExpressionInterface $expression)
    {
        $this->chain[] = ['filter', $expression];

        return $this;
    }

    /**
     * @param BooleanExpressionInterface $expression
     *
     * @return BooleanExpressionInterface
     */
    public function not(BooleanExpressionInterface $expression)
    {
        return $this->expressionFactory->not($expression);
    }

    /**
     * @param BooleanExpressionInterface $expression
     *
     * @return BooleanExpressionInterface
     */
    public function id(BooleanExpressionInterface $expression)
    {
        return $this->expressionFactory->id($expression);
    }

    /**
     * @param BooleanExpressionInterface $first
     * @param BooleanExpressionInterface $second
     *
     * @return BooleanExpressionInterface
     */
    public function orX(BooleanExpressionInterface $first, BooleanExpressionInterface $second)
    {
        return $this->expressionFactory->orX($first, $second);
    }

    /**
     * @param BooleanExpressionInterface $first
     * @param BooleanExpressionInterface $second
     *
     * @return BooleanExpressionInterface
     */
    public function andX(BooleanExpressionInterface $first, BooleanExpressionInterface $second)
    {
        return $this->expressionFactory->andX($first, $second);
    }

    /**
     * @param string $class
     * @param string $method
     * @param array $arguments
     *
     * @return ExpressionBuilder
     */
    public function helper($class, $method, array $arguments = [])
    {
        $this->chain[] = ['helper', [$class, $method, $arguments]];

        return $this;
    }

    /**
     * @return ExpressionBuilder
     */
    public function context()
    {
        $this->type = 'context';

        return $this;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
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
                        $expression = $this->expressionFactory->property($expression, new TerminalExpression($property));
                    }
                    break;
                case 'method':
                    list ($name, $arguments) = $value;
                    $methods = explode('.', $name);
                    foreach ($methods as $method) {
                        $expression = $this->expressionFactory->method($expression, new TerminalExpression($method), new TerminalExpression($arguments));
                    }
                    break;
                case 'function':
                    list ($name, $arguments) = $value;
                    $expression = $this->expressionFactory->func($expression, new TerminalExpression($name), new TerminalExpression($arguments));
                    break;
                case 'filter':
                    $expression = $this->expressionFactory->filter($expression, $value);
                    break;
                case 'helper':
                    list ($class, $method, $arguments) = $value;
                    $expression =  $this->expressionFactory->helper($expression, new TerminalExpression($class), new TerminalExpression($method), new TerminalExpression($arguments));
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