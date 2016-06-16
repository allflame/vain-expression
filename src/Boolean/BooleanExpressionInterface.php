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
namespace Vain\Expression\Boolean;

use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\ExpressionInterface;

/**
 * Interface BooleanExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method BooleanResultInterface interpret(\ArrayAccess $context = null)
 */
interface BooleanExpressionInterface extends ExpressionInterface
{
}