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
namespace Vain\Expression\Boolean\Binary;

use Vain\Expression\Boolean\BooleanExpressionInterface;

/**
 * Interface BinaryExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface BinaryExpressionInterface extends BooleanExpressionInterface
{
    /**
     * @return BooleanExpressionInterface
     */
    public function getFirstExpression();

    /**
     * @return BooleanExpressionInterface
     */
    public function getSecondExpression();
}