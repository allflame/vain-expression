<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\NonTerminal\Method;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class MethodExpression implements NonTerminalExpressionInterface
{
    private $expression;

    private $method;

    private $arguments;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $method
     * @param array $arguments
     */
    public function __construct(ExpressionInterface $expression, $method, array $arguments = [])
    {
        $this->expression = $expression;
        $this->method = $method;
        $this->arguments = $arguments;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
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
        $data = $this->expression->interpret($context);

        if (false === method_exists($data, $this->method)) {
            throw new UnknownMethodException($this, $data, $this->method);
        }

        return call_user_func([$data, $this->method], ...$this->arguments);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if (0 === count($this->arguments)) {
            return sprintf('%s->%s()', $this->expression->__toString(), $this->method);
        }

        return sprintf('%s->%s(%s, %s)', $this->expression->__toString(), $this->method, implode(', ', $this->arguments));
    }


}