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
namespace Vain\Expression\Quaternary;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

/**
 * Interface QuaternaryExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface QuaternaryExpressionInterface extends NonTerminalExpressionInterface
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

    /**
     *
     * @return ExpressionInterface
     */
    public function getFourthExpression();
}