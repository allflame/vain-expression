<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:29 AM
 */
namespace Vain\Expression\NonTerminal\Helper;

use Vain\Expression\Exception\UnknownHelperException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class HelperExpression implements NonTerminalExpressionInterface
{
    private $data;

    private $class;

    private $method;

    private $arguments;

    /**
     * PropertyDescriptorDecorator constructor.
     *
     * @param ExpressionInterface $data
     * @param ExpressionInterface $class
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     */
    public function __construct(
        ExpressionInterface $data,
        ExpressionInterface $class,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    ) {
        $this->data = $data;
        $this->class = $class;
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
        $class = $this->class->interpret($context);
        $method = $this->method->interpret($context);
        if (false === method_exists($class, $method)) {
            throw new UnknownHelperException($this, $context, $class, $method);
        }

        return call_user_func(
            [$class, $method],
            $this->data->interpret($context),
            ...$this->arguments->interpret($context)
        );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if ('' === $this->arguments->__toString()) {
            return sprintf('%s::%s(%s)', $this->class, $this->data, $this->method);
        }

        return sprintf('%s::%s(%s, %s)', $this->class, $this->data, $this->method, $this->arguments);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'helper' => [
                'data' => $this->data->toArray(),
                'class' => $this->class->toArray(),
                'method' => $this->method->toArray(),
                'arguments' => $this->arguments->toArray()
            ]
        ];
    }
}