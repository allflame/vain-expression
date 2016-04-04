<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:57 PM
 */

namespace Vain\Expression\Evaluator;

interface EvaluatableInterface
{
    /**
     * @param ExpressionEvaluatorInterface $evaluator
     * 
     * @return bool
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator);
}