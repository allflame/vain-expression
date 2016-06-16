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

use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;

/**
 * Class UnknownFunctionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method FunctionExpression getExpression
 */
class UnknownFunctionException extends InterpretationException
{
    /**
     * UnknownFunctionException constructor.
     *
     * @param FunctionExpression $expression
     * @param \ArrayAccess       $context
     * @param int                $functionName
     */
    public function __construct(FunctionExpression $expression, \ArrayAccess $context, $functionName)
    {
        parent::__construct($expression, $context, sprintf('Function %s is not registered', $functionName), 0, null);
    }
}