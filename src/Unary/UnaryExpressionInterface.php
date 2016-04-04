<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:00 PM
 */

namespace Vain\Expression\Unary;

use Vain\Expression\ExpressionInterface;

interface UnaryExpressionInterface extends ExpressionInterface
{
    /**
     * @return ExpressionInterface
     */
    public function getExpression();
}