<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:29 PM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;
use Vain\Expression\Interpreter\InterpreterInterface;

class UnknownFunctionException extends InterpreterException
{
    /**
     * UnknownFunctionException constructor.
     * @param InterpreterInterface $interpreter
     * @param FunctionExpression $expression
     */
    public function __construct(InterpreterInterface $interpreter, FunctionExpression $expression)
    {
        parent::__construct($interpreter, $expression, sprintf('Function %s is not registered', $expression->getFunctionName()), 0, null);
    }
}