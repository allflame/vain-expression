<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 9:08 PM
 */

namespace Logger;

use Vain\Core\Result\ResultInterface;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Logger\LoggerInterface;
use Psr\Log\LoggerInterface as PsrLoggerInterface;

class Logger implements LoggerInterface
{
    private $logger;

    /**
     * Logger constructor.
     * @param PsrLoggerInterface $logger
     */
    public function __construct(PsrLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function beforeEvaluation(ExpressionInterface $expression, EvaluatorInterface $evaluator)
    {
        $this->logger->debug(sprintf('Starting evaluating expression %s with evaluator %s', get_class($expression), get_class($evaluator)));
    }

    /**
     * @inheritDoc
     */
    public function afterEvaluation(ExpressionInterface $expression, EvaluatorInterface $evaluator, ResultInterface $result)
    {
        if (false === $result->getStatus()) {
            $this->logger->debug(sprintf('Finished evaluating expression %s with evaluator %s: FALSE', get_class($expression), get_class($evaluator)));
        } else {
            $this->logger->debug(sprintf('Finished evaluating expression %s with evaluator %s: TRUE', get_class($expression), get_class($evaluator)));
        }
    }
}