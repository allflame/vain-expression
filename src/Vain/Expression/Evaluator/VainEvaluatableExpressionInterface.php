<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:57 PM
 */

namespace Vain\Expression\Evaluator;

interface VainEvaluatableExpressionInterface
{
    /**
     * @param VainExpressionEvaluatorInterface $evaluator
     * 
     * @return bool
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator);
}