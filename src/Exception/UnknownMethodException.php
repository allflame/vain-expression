<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 6:31 PM
 */
namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Method\MethodExpression;

/**
 * @method MethodExpression getExpression
 */
class UnknownMethodException extends InterpretationException
{
    /**
     * UnknownMethodException constructor.
     *
     * @param MethodExpression $expression
     * @param \ArrayAccess     $context
     * @param object           $data
     * @param string           $method
     */
    public function __construct(MethodExpression $expression, \ArrayAccess $context, $data, $method)
    {
        parent::__construct(
            $expression,
            $context,
            sprintf('Method %s does not exists in data', get_class($data), $method),
            0,
            null
        );
    }
}