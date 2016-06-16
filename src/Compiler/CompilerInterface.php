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
namespace Vain\Expression\Compiler;

use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;
use Vain\Expression\Terminal\TerminalExpressionInterface;

/**
 * Interface CompilerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CompilerInterface
{
    /**
     * @param NonTerminalExpressionInterface $expression
     *
     * @return TerminalExpressionInterface
     */
    public function compile(NonTerminalExpressionInterface $expression);
}