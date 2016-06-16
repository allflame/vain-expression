<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */
namespace Vain\Expression\Boolean\Binary;

use Vain\Expression\Boolean\BooleanExpressionInterface;

interface BinaryExpressionInterface extends BooleanExpressionInterface
{
    /**
     * @return BooleanExpressionInterface
     */
    public function getFirstExpression();

    /**
     * @return BooleanExpressionInterface
     */
    public function getSecondExpression();
}