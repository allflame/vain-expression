<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/15/16
 * Time: 10:23 AM
 */

namespace Vain\Expression\NonTerminal\Context;

use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class ContextExpression implements NonTerminalExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $context;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return 'context';
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['context' => []];
    }
}