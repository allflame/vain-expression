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

namespace Vain\Expression\Binary;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

/**
 * Interface BinaryExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface BinaryExpressionInterface extends NonTerminalExpressionInterface
{
    /**
     * @return ExpressionInterface
     */
    public function getFirstExpression() : ExpressionInterface;

    /**
     * @return ExpressionInterface
     */
    public function getSecondExpression() : ExpressionInterface;
}