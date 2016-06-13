<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 6:31 PM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Method\MethodExpression;
use Vain\Expression\Interpreter\InterpreterInterface;

class UnknownMethodException extends InterpreterException
{
    /**
     * UnknownMethodException constructor.
     * @param InterpreterInterface $interpreter
     * @param MethodExpression $expression
     */
    public function __construct(InterpreterInterface $interpreter, MethodExpression $expression)
    {
        parent::__construct($interpreter, $expression, sprintf('Method %s does not exists in data', $expression->getMethod()), 0, null);
    }
}