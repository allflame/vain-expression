<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
declare(strict_types = 1);

namespace Vain\Expression\Parser\Algorithm\Dijkstra;

use Vain\Expression\Exception\UnclosedBracketException;
use Vain\Expression\Parser\Algorithm\Dijkstra\Engine\DijkstraEngineInterface;
use Vain\Expression\Parser\Algorithm\ParserAlgorithmInterface;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Stack\ParserOperatorRecordStack;
use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;

/**
 * Class DijkstraParserAlgorithm
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DijkstraParserAlgorithm implements ParserAlgorithmInterface
{
    private $bracketEngine;

    private $functionEngine;

    private $operatorEngine;

    private $postBracketEngine;

    private $finishEngine;

    private $rplQueue;

    private $operatorStack;

    /**
     * DjkstraParserAlgorithm constructor.
     *
     * @param DijkstraEngineInterface $bracketEngine
     * @param DijkstraEngineInterface $functionEngine
     * @param DijkstraEngineInterface $operatorEngine
     * @param DijkstraEngineInterface $postBracketEngine
     * @param DijkstraEngineInterface $finishEngine
     * @param ParserRecordQueue $rplQueue
     * @param ParserOperatorRecordStack $operatorStack
     */
    public function __construct(
        DijkstraEngineInterface $bracketEngine,
        DijkstraEngineInterface $functionEngine,
        DijkstraEngineInterface $operatorEngine,
        DijkstraEngineInterface $postBracketEngine,
        DijkstraEngineInterface $finishEngine,
        ParserRecordQueue $rplQueue,
        ParserOperatorRecordStack $operatorStack
    ) {
        $this->bracketEngine = $bracketEngine;
        $this->functionEngine = $functionEngine;
        $this->operatorEngine = $operatorEngine;
        $this->postBracketEngine = $postBracketEngine;
        $this->finishEngine = $finishEngine;
        $this->rplQueue = $rplQueue;
        $this->operatorStack = $operatorStack;
    }

    /**
     * @inheritDoc
     */
    public function getRplQueue() : ParserRecordQueue
    {
        return $this->rplQueue;
    }

    /**
     * @inheritDoc
     */
    public function getOperatorStack() : ParserOperatorRecordStack
    {
        return $this->operatorStack;
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserRecordQueue $recordQueue) : ParserRecordQueue
    {
        while (false === $recordQueue->isEmpty()) {
            $recordQueue->dequeue()->accept($this);
        }

        while (false === $this->operatorStack->isEmpty()) {
            $record = $this->operatorStack->pop();
            if (false === $record->accept($this->finishEngine)) {
                throw new UnclosedBracketException($this, $record);
            }
            $this->rplQueue->enqueue($record);
        }

        return $this->rplQueue;
    }

    /**
     * @inheritDoc
     */
    public function bracketX(BracketOperatorParserRecord $bracketRecord)
    {
        if ($bracketRecord->isLeft()) {
            $this->operatorStack->push($bracketRecord);

            return $this;
        }

        $matchingBracketFound = false;
        while (false === $this->operatorStack->isEmpty()) {
            $record = $this->operatorStack->pop();
            if (false === $record->accept($this->bracketEngine->withRecord($bracketRecord))) {
                $matchingBracketFound = true;
                break;
            }
            $this->rplQueue->enqueue($record);
        }

        if (false === $matchingBracketFound) {
            throw new UnclosedBracketException($this, $bracketRecord);
        }

        if (false === $this->operatorStack->isEmpty() && ($record = $this->operatorStack->top())
            && $record->accept(
                $this->postBracketEngine->withRecord($bracketRecord)
            )
        ) {
            $this->operatorStack->pop();
            $this->rplQueue->enqueue($record);
        } else {
            $this->rplQueue->enqueue($bracketRecord);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionOperatorParserRecord $functionRecord)
    {
        $this->operatorStack->push($functionRecord);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function operator(RegularOperatorParserRecord $operatorRecord)
    {
        while (false === $this->operatorStack->isEmpty()
               && ($record = $this->operatorStack->top())
               && $record->accept($this->operatorEngine->withRecord($operatorRecord))) {
            $this->operatorStack->pop();
            $this->rplQueue->enqueue($record);
        }
        $this->operatorStack->push($operatorRecord);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function terminal(TerminalParserRecord $terminalRecord)
    {
        $this->rplQueue->enqueue($terminalRecord);

        return $this;
    }
}
