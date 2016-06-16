<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 10:36 AM
 */
namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Property\PropertyExpression;

class InaccessiblePropertyException extends InterpretationException
{
    /**
     * InaccessiblePropertyException constructor.
     *
     * @param PropertyExpression $expression
     * @param \ArrayAccess       $context
     * @param string             $data
     */
    public function __construct(PropertyExpression $expression, \ArrayAccess $context, $data)
    {
        parent::__construct(
            $expression,
            $context,
            sprintf('Cannot extract property for data of type %s', gettype($data)),
            0,
            null
        );
    }
}