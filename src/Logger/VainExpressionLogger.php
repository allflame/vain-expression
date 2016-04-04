<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:32 AM
 */

namespace Vain\Expression\Logger;

use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\VainExpressionInterface;

interface VainExpressionLoggerInterface
{
    /**
     * @param VainExpressionInterface $expression
     * @param VainExpressionEvaluatorInterface $evaluator
     *
     * @return VainExpressionLoggerInterface
     */
    public function beforeEvaluation(VainExpressionInterface $expression, VainExpressionEvaluatorInterface $evaluator);

    /**
     * @param VainExpressionInterface $expression
     * @param VainExpressionEvaluatorInterface $evaluator
     * @param bool $result
     *
     * @return VainExpressionLoggerInterface
     */
    public function afterEvaluation(VainExpressionInterface $expression, VainExpressionEvaluatorInterface $evaluator, $result);

    /**
     * @param VainExpressionInterface $expression
     * @param VainExpressionParserInterface $parser
     *
     * @return VainExpressionLoggerInterface
     */
    public function beforeParsing(VainExpressionInterface $expression, VainExpressionParserInterface $parser);

    /**
     * @param VainExpressionInterface $expression
     * @param VainExpressionParserInterface $parser
     * @param string $result
     *
     * @return VainExpressionLoggerInterface
     */
    public function afterParsing(VainExpressionInterface $expression, VainExpressionParserInterface $parser, $result);
}