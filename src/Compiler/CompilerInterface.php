<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/15/16
 * Time: 8:31 AM
 */

namespace Vain\Expression\Compiler;

use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;
use Vain\Expression\Terminal\TerminalExpressionInterface;

interface CompilerInterface
{
    /**
     * @param NonTerminalExpressionInterface $expression
     *
     * @return TerminalExpressionInterface
     */
    public function compile(NonTerminalExpressionInterface $expression);
}