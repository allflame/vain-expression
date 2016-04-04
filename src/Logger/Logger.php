<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 9:08 PM
 */

namespace Logger;


use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Logger\LoggerInterface;
use Vain\Expression\Parser\ExpressionParserInterface;

class Logger implements LoggerInterface
{
    private $logger;

    /**
     * Logger constructor.
     * @param \Vain\Logger\LoggerInterface $logger
     */
    public function __construct(\Vain\Logger\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function beforeEvaluation(ExpressionInterface $expression, ExpressionEvaluatorInterface $evaluator)
    {
        $this->logger->debug(sprintf('Starting evaluating expression %s with evaluator %s', get_class($expression), get_class($evaluator)));
    }

    /**
     * @inheritDoc
     */
    public function afterEvaluation(ExpressionInterface $expression, ExpressionEvaluatorInterface $evaluator, $result)
    {
        if (false === $result) {
            $this->logger->debug(sprintf('Finished evaluating expression %s with evaluator %s: FALSE', get_class($expression), get_class($evaluator)));
        } else {
            $this->logger->debug(sprintf('Finished evaluating expression %s with evaluator %s: TRUE', get_class($expression), get_class($evaluator)));
        }
    }

    /**
     * @inheritDoc
     */
    public function beforeParsing(ExpressionInterface $expression, ExpressionParserInterface $parser)
    {
        $this->logger->debug(sprintf('Starting evaluating expression %s with evaluator %s', get_class($expression), get_class($parser)));
    }

    /**
     * @inheritDoc
     */
    public function afterParsing(ExpressionInterface $expression, ExpressionParserInterface $parser, $result)
    {
        $this->logger->debug(sprintf('Finished parsing expression %s with parser %s: %s', get_class($expression), get_class($parser), $result));
    }
}