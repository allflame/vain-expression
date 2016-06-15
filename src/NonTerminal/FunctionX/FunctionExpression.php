<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:24 PM
 */

namespace Vain\Expression\NonTerminal\FunctionX;

use Vain\Expression\Exception\UnknownFunctionException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class FunctionExpression implements NonTerminalExpressionInterface
{
    private $data;

    private $functionName;

    private $arguments;

    /**
     * FunctionDescriptorDecorator constructor.
     * @param ExpressionInterface $data
     * @param ExpressionInterface $functionName
     * @param ExpressionInterface $arguments
     */
    public function __construct(ExpressionInterface $data, ExpressionInterface $functionName, ExpressionInterface $arguments)
    {
        $this->data = $data;
        $this->functionName = $functionName;
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
    public function getFunctionName()
    {
        return $this->functionName;
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
        $function = $this->functionName->interpret($context);

        if (false === function_exists($function)) {
            throw new UnknownFunctionException($this, $context, $function);
        }

        return call_user_func($function, $this->data->interpret($context), ...$this->arguments->interpret($context));

    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if ('' === $this->arguments->__toString()) {
            return sprintf('%s(%s)', $this->functionName, $this->data);
        }

        return sprintf('%s(%s, %s)', $this->functionName, $this->data, $this->arguments);
    }
}