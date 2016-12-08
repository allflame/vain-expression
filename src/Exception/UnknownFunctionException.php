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

use Vain\Expression\FunctionX\FunctionExpression;

/**
 * Class UnknownFunctionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownFunctionException extends InterpretationException
{
    /**
     * UnknownFunctionException constructor.
     *
     * @param FunctionExpression $expression
     * @param \ArrayAccess       $context
     * @param string             $functionName
     */
    public function __construct(FunctionExpression $expression, \ArrayAccess $context, string $functionName)
    {
        parent::__construct($expression, $context, sprintf('Function %s is not registered', $functionName));
    }
}
