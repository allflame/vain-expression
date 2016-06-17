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
namespace Vain\Expression\Ternary;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

/**
 * Interface TernaryExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface TernaryExpressionInterface extends NonTerminalExpressionInterface
{
    /**
     *
     * @return ExpressionInterface
     */
    public function getFirstExpression();

    /**
     *
     * @return ExpressionInterface
     */
    public function getSecondExpression();

    /**
     *
     * @return ExpressionInterface
     */
    public function getThirdExpression();
}