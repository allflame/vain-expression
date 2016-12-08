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
declare(strict_types = 1);

namespace Vain\Expression\Exception;

use Vain\Expression\Property\PropertyExpression;

/**
 * Class UnknownPropertyException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownPropertyException extends InterpretationException
{
    /**
     * UnknownPropertyException constructor.
     *
     * @param PropertyExpression $expression
     * @param \ArrayAccess       $context
     * @param mixed              $data
     * @param string             $property
     */
    public function __construct(PropertyExpression $expression, \ArrayAccess $context, $data, string $property)
    {
        parent::__construct(
            $expression,
            $context,
            sprintf('Property %s not found in data %s', $property, var_export($data, true))
        );
    }
}
