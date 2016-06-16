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
namespace Vain\Expression\NonTerminal\Context;

use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

/**
 * Class ContextExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
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