<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
namespace Vain\Expression\Exception;

use Vain\Expression\Property\PropertyExpression;

/**
 * Class UnknownPropertyException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
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