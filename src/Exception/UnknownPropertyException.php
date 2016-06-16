<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 6:29 PM
 */
namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Property\PropertyExpression;

/**
 * @method PropertyExpression getExpression
 */
class UnknownPropertyException extends InterpretationException
{
    /**
     * UnknownPropertyException constructor.
     *
     * @param PropertyExpression $expression
     * @param \ArrayAccess       $context
     * @param string             $data
     * @param int                $property
     */
    public function __construct(PropertyExpression $expression, \ArrayAccess $context, $data, $property)
    {
        parent::__construct(
            $expression,
            $context,
            sprintf('Property %s not found in data %s', $property, var_export($data, true)),
            0,
            null
        );
    }
}