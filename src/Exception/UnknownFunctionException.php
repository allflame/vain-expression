<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:29 PM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;

/**
 * @method FunctionExpression getExpression
 */
class UnknownFunctionException extends InterpretationException
{

    /**
     * UnknownFunctionException constructor.
     * @param FunctionExpression $expression
     * @param \ArrayAccess $context
     * @param int $functionName
     */
    public function __construct(FunctionExpression $expression, \ArrayAccess $context, $functionName)
    {
        parent::__construct($expression, $context, sprintf('Function %s is not registered', $functionName), 0, null);
    }
}