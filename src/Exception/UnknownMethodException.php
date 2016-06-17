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

use Vain\Expression\NonTerminal\Method\MethodExpression;

/**
 * Class UnknownMethodException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
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