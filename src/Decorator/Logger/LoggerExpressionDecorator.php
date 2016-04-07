<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:32 AM
 */

namespace Vain\Expression\Decorator\Logger;

use Vain\Expression\Decorator\AbstractExpressionDecorator;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\Logger\LoggerInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\ExpressionInterface;

class LoggerExpressionDecorator extends AbstractExpressionDecorator
{
    private $expressionLogger;

    /**
     * VainExpressionLoggerDecorator constructor.
     * @param LoggerInterface $logger
     * @param ExpressionInterface $expression
     */
    public function __construct(LoggerInterface $logger, ExpressionInterface $expression)
    {
        $this->expressionLogger = $logger;
        parent::__construct($expression);
    }

    /**
     * @inheritDoc
     */
    public function evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null)
    {
        $this->expressionLogger->beforeEvaluation($this->getExpression(), $evaluator);
        $result =  parent::evaluate($evaluator, $runtimeData);
        $this->expressionLogger->afterEvaluation($this->getExpression(), $evaluator, $result);
        
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        $this->expressionLogger->beforeParsing($this->getExpression(), $parser);
        $result =  parent::parse($parser);
        $this->expressionLogger->afterParsing($this->getExpression(), $parser, $result);

        return $result;
    }
}