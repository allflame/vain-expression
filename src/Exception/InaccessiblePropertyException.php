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
 * Class InaccessiblePropertyException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class InaccessiblePropertyException extends InterpretationException
{
    /**
     * InaccessiblePropertyException constructor.
     *
     * @param PropertyExpression $expression
     * @param \ArrayAccess       $context
     * @param mixed              $data
     */
    public function __construct(PropertyExpression $expression, \ArrayAccess $context, $data)
    {
        parent::__construct(
            $expression,
            $context,
            sprintf('Cannot extract property for data of type %s', gettype($data))
        );
    }
}