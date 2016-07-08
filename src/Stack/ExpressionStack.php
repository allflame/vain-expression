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
namespace Vain\Expression\Stack;

use Vain\Expression\ExpressionInterface;

/**
 * Class ExpressionQueue
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ExpressionInterface current
 * @method ExpressionInterface top
 * @method ExpressionInterface bottom
 */
class ExpressionStack extends \SplStack
{
}