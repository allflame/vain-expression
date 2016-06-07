<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:32 AM
 */

namespace Vain\Expression\Logger;

use Vain\Core\Result\ResultInterface;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\ExpressionInterface;

interface LoggerInterface
{
    /**
     * @param ExpressionInterface $expression
     * @param EvaluatorInterface $evaluator
     *
     * @return LoggerInterface
     */
    public function beforeEvaluation(ExpressionInterface $expression, EvaluatorInterface $evaluator);

    /**
     * @param ExpressionInterface $expression
     * @param EvaluatorInterface $evaluator
     * @param ResultInterface $result
     *
     * @return LoggerInterface
     */
    public function afterEvaluation(ExpressionInterface $expression, EvaluatorInterface $evaluator, ResultInterface $result);
}