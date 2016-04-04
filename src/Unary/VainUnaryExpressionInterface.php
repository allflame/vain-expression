<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:00 PM
 */

namespace Vain\Expression\Unary;

use Vain\Expression\VainExpressionInterface;

interface VainUnaryExpressionInterface extends VainExpressionInterface
{
    /**
     * @return VainExpressionInterface
     */
    public function getExpression();
}