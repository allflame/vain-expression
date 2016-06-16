<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/15/16
 * Time: 10:04 AM
 */
namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Mode\ModeExpression;

/**
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