<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:19 PM
 */

namespace Vain\Expression\Exception;


use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;

class ModeMismatchExpressionEvaluatorException extends ExpressionEvaluatorException
{
    /**
     * ModeMismatchExpressionEvaluatorException constructor.
     * @param ExpressionEvaluatorInterface $evaluator
     * @param string $mode1
     * @param string $mode2
     */
    public function __construct(ExpressionEvaluatorInterface $evaluator, $mode1, $mode2)
    {
        parent::__construct($evaluator, sprintf('Unable to compare values with different modes %s and %s', $mode1, $mode2), 0, null);
    }
}