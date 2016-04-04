<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:32 AM
 */

namespace Vain\Expression\Logger;

use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\Parser\ExpressionParserInterface;
use Vain\Expression\ExpressionInterface;

interface LoggerInterface
{
    /**
     * @param ExpressionInterface $expression
     * @param ExpressionEvaluatorInterface $evaluator
     *
     * @return LoggerInterface
     */
    public function beforeEvaluation(ExpressionInterface $expression, ExpressionEvaluatorInterface $evaluator);

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionEvaluatorInterface $evaluator
     * @param bool $result
     *
     * @return LoggerInterface
     */
    public function afterEvaluation(ExpressionInterface $expression, ExpressionEvaluatorInterface $evaluator, $result);

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionParserInterface $parser
     *
     * @return LoggerInterface
     */
    public function beforeParsing(ExpressionInterface $expression, ExpressionParserInterface $parser);

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionParserInterface $parser
     * @param string $result
     *
     * @return LoggerInterface
     */
    public function afterParsing(ExpressionInterface $expression, ExpressionParserInterface $parser, $result);
}