<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:38 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Helper\HelperExpression;
use Vain\Expression\Interpreter\InterpreterInterface;

class UnknownHelperException extends InterpreterException
{
    /**
     * UnknownHelperException constructor.
     * @param InterpreterInterface $interpreter
     * @param HelperExpression $expression
     */
    public function __construct(InterpreterInterface $interpreter, HelperExpression $expression)
    {
        parent::__construct($interpreter, $expression, sprintf('Helper method %s::%s is not registered', $expression->getClass(), $expression->getMethod()), 0, null);
    }
}