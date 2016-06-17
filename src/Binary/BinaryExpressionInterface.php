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
namespace Vain\Expression\Binary;

use Vain\Expression\ExpressionInterface;

/**
 * Interface BinaryExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface BinaryExpressionInterface extends ExpressionInterface
{
    /**
     * @return ExpressionInterface
     */
    public function getFirstExpression();

    /**
     * @return ExpressionInterface
     */
    public function getSecondExpression();
}