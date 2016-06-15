<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:29 AM
 */

namespace Vain\Expression\NonTerminal\Helper;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class HelperExpression implements NonTerminalExpressionInterface
{
    private $expression;

    private $class;

    private $method;

    private $arguments;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $class
     * @param string $method
     * @param array $arguments
     */
    public function __construct(ExpressionInterface $expression, $class, $method, array $arguments = [])
    {
        $this->expression = $expression;
        $this->class = $class;
        $this->method = $method;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        // TODO: Implement interpret() method.
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if (0 === count($this->arguments)) {
            return sprintf('%s::%s(%s)', $this->class, $this->expression->__toString(), $this->method);
        }

        return sprintf('%s::%s(%s, %s)', $this->class, $this->expression->__toString(), $this->method, implode(', ', $this->arguments));
    }
}