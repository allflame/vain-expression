<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/9/16
 * Time: 7:28 AM
 */

namespace Vain\Expression\Boolean;

use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\ExpressionInterface;

/**
 * @method BooleanResultInterface interpret(\ArrayAccess $context = null)
 */
interface BooleanExpressionInterface extends ExpressionInterface
{
}