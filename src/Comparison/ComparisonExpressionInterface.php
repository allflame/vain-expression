<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:25 AM
 */

namespace Vain\Expression\Comparison;

use Vain\Comparator\Result\ComparableResultInterface;
use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\ExpressionInterface;

/**
 * @method ComparableResultInterface evaluate() evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null)
 */
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