<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 6:29 PM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Property\PropertyExpression;
use Vain\Expression\Interpreter\InterpreterInterface;

class UnknownPropertyException extends InterpreterException
{
    /**
     * UnknownPropertyException constructor.
     * @param InterpreterInterface $interpreter
     * @param PropertyExpression $expression
     */
    public function __construct(InterpreterInterface $interpreter, PropertyExpression $expression)
    {
        parent::__construct($interpreter, $expression, sprintf('Property %s not found in data', $expression->getProperty()), 0, null);
    }
}