<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:25 AM
 */

namespace Vain\Expression\Comparison;

use Symfony\Component\Console\Descriptor\DescriptorInterface;
use Vain\Expression\ExpressionInterface;

interface ComparisonExpressionInterface extends ExpressionInterface
{
    /**
     * @return DescriptorInterface
     */
    public function getWhat();

    /**
     * @return DescriptorInterface
     */
    public function getAgainst();
}