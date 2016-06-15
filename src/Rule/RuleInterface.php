<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/10/16
 * Time: 9:41 AM
 */

namespace Vain\Expression\Rule;

use Vain\Expression\Boolean\BooleanExpressionInterface;

interface RuleInterface extends BooleanExpressionInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return BooleanExpressionInterface
     */
    public function getExpression();
}