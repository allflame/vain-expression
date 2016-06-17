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
namespace Vain\Expression\Boolean\Result;

use Vain\Core\Result\ResultInterface;
use Vain\Expression\Boolean\BooleanExpressionInterface;

/**
 * Interface BooleanResultInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method BooleanResultInterface invert
 */
interface BooleanResultInterface extends ResultInterface, BooleanExpressionInterface
{
}