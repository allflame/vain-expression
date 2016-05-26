<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:57 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Core\Result\ResultInterface;

interface EvaluatableInterface
{
    /**
     * @param EvaluatorInterface $evaluator
     * @param \ArrayAccess $runtimeData
     * 
     * @return ResultInterface
     */
    public function evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null);
}