<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\NonTerminal\Method;

use Vain\Expression\Exception\UnknownMethodException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class MethodExpression implements NonTerminalExpressionInterface
{
    private $data;

    private $method;

    private $arguments;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $data
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     */
    public function __construct(ExpressionInterface $data, ExpressionInterface $method, ExpressionInterface $arguments)
    {
        $this->data = $data;
        $this->method = $method;
        $this->arguments = $arguments;
    }

    /**
     * @return ExpressionInterface
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return ExpressionInterface
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return ExpressionInterface
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
        $data = $this->data->interpret($context);
        $method = $this->method->interpret($context);

        if (false === method_exists($data, $method)) {
            throw new UnknownMethodException($this, $context, $data, $method);
        }

        return call_user_func([$data, $method], ...$this->arguments->interpret($context));
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if ('' === $this->arguments->__toString()) {
            return sprintf('%s->%s()', $this->data, $this->method);
        }

        return sprintf('%s->%s(%s, %s)', $this->data, $this->method, $this->arguments);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['method' => ['data' => $this->data->toArray(), 'method' => $this->method->toArray(), 'arguments' => $this->arguments->toArray()]];
    }
}