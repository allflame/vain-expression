<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:24 PM
 */

namespace Vain\Expression\NonTerminal\FunctionX;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class FunctionExpression implements NonTerminalExpressionInterface
{
    private $expression;

    private $functionName;

    private $arguments;

    /**
     * FunctionDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $functionName
     * @param array $arguments
     */
    public function __construct(ExpressionInterface $expression, $functionName, array $arguments = [])
    {
        $this->expression = $expression;
        $this->functionName = $functionName;
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
    public function getFunctionName()
    {
        return $this->functionName;
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
            return sprintf('%s(%s)', $this->functionName, $this->expression->__toString());
        }

        return sprintf('%s(%s, %s)', $this->functionName, $this->expression->__toString(), implode(', ', $this->arguments));
    }
}