<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */

namespace Vain\Expression\Binary;

use Vain\Expression\ExpressionInterface;

interface BinaryExpressionInterface extends ExpressionInterface
{
    /**
     * @return ExpressionInterface
     */
    public function getFirstExpression();

    /**
     * @return ExpressionInterface
     */
    public function getSecondExpression();
}