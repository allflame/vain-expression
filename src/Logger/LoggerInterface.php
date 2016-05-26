<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:32 AM
 */

namespace Vain\Expression\Logger;

use Vain\Comparator\Result\ComparableResultInterface;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\Parser\ParserInterface;
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
     * @param ComparableResultInterface $result
     *
     * @return LoggerInterface
     */
    public function afterEvaluation(ExpressionInterface $expression, EvaluatorInterface $evaluator, ComparableResultInterface $result);

    /**
     * @param ExpressionInterface $expression
     * @param ParserInterface $parser
     *
     * @return LoggerInterface
     */
    public function beforeParsing(ExpressionInterface $expression, ParserInterface $parser);

    /**
     * @param ExpressionInterface $expression
     * @param ParserInterface $parser
     * @param string $result
     *
     * @return LoggerInterface
     */
    public function afterParsing(ExpressionInterface $expression, ParserInterface $parser, $result);
}