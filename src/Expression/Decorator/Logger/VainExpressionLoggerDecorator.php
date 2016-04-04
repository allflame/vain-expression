<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:32 AM
 */

namespace Vain\Expression\Decorator\Logger;

use Vain\Expression\Decorator\AbstractVainExpressionDecorator;
use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Logger\VainExpressionLoggerInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\VainExpressionInterface;

class VainExpressionLoggerDecorator extends AbstractVainExpressionDecorator
{
    private $expressionLogger;

    /**
     * VainExpressionLoggerDecorator constructor.
     * @param VainExpressionLoggerInterface $logger
     * @param VainExpressionInterface $expression
     */
    public function __construct(VainExpressionLoggerInterface $logger, VainExpressionInterface $expression)
    {
        $this->expressionLogger = $logger;
        parent::__construct($expression);
    }

    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        $this->expressionLogger->beforeEvaluation($this->getExpression(), $evaluator);
        $result =  parent::evaluate($evaluator);
        $this->expressionLogger->afterEvaluation($this->getExpression(), $evaluator, $result);
        
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
        $this->expressionLogger->beforeParsing($this->getExpression(), $parser);
        $result =  parent::parse($parser);
        $this->expressionLogger->afterParsing($this->getExpression(), $parser, $result);

        return $result;
    }
}