<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/14/16
 * Time: 6:02 AM
 */
namespace Vain\Expression\Boolean\Result;

use Vain\Core\Result\ResultInterface;
use Vain\Expression\Boolean\BooleanExpressionInterface;

/**
 * @method BooleanResultInterface invert
 */
interface BooleanResultInterface extends ResultInterface, BooleanExpressionInterface
{
}