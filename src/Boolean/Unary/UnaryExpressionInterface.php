<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:00 PM
 */
namespace Vain\Expression\Boolean\Unary;

use Vain\Expression\Boolean\BooleanExpressionInterface;

interface UnaryExpressionInterface extends BooleanExpressionInterface
{
    /**
     * @return BooleanExpressionInterface
     */
    public function getExpression();
}