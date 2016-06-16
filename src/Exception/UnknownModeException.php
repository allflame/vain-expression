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

use Vain\Expression\NonTerminal\Mode\ModeExpression;

/**
 * Class UnknownModeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 * 
 * @method ModeExpression getExpression
 */
class UnknownModeException extends InterpretationException
{
    /**
     * UnknownModeException constructor.
     *
     * @param ModeExpression $expression
     * @param \ArrayAccess   $context
     * @param string         $mode
     */
    public function __construct(ModeExpression $expression, \ArrayAccess $context, $mode)
    {
        parent::__construct($expression, $context, sprintf('Mode %s is not supported', $mode), 0, null);
    }
}