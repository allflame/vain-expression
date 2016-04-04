<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:25 AM
 */

namespace Vain\Expression\Comparison;

use Vain\Expression\ExpressionInterface;

interface ComparisonExpressionInterface extends ExpressionInterface
{
    /**
     * @return mixed
     */
    public function getWhat();

    /**
     * @return mixed
     */
    public function getAgainst();

    /**
     * @return mixed
     */
    public function getType();
}