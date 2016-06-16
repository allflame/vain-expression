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
namespace Vain\Expression\Boolean\Unary;

use Vain\Expression\Boolean\BooleanExpressionInterface;

/**
 * Interface UnaryExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface UnaryExpressionInterface extends BooleanExpressionInterface
{
    /**
     * @return BooleanExpressionInterface
     */
    public function getExpression();
}