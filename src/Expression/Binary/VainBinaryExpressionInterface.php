<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */

namespace Vain\Expression\Binary;

use Vain\Expression\VainExpressionInterface;

interface VainBinaryExpressionInterface extends VainExpressionInterface
{
    /**
     * @return VainExpressionInterface
     */
    public function getFirstExpression();

    /**
     * @return VainExpressionInterface
     */
    public function getSecondExpression();
}