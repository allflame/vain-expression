<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:57 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Data\Runtime\RuntimeData;

interface EvaluatableExpressionInterface
{
    /**
     * @param ExpressionEvaluatorInterface $evaluator
     * @param RuntimeData $runtimeData
     * 
     * @return bool
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator, RuntimeData $runtimeData = null);
}