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
namespace Vain\Expression\Parser\Algorithm\Dijkstra;

use Vain\Expression\Exception\UnclosedBracketException;
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

    private $rplQueue;

    private $operatorStack;

    /**
     * DjkstraParserAlgorithm constructor.
     *
     * @param ParserRecordQueue $rplQueue
     * @param ParserOperatorRecordStack $operatorStack
     */
    public function __construct(ParserRecordQueue $rplQueue, ParserOperatorRecordStack $operatorStack)
    {
        $this->rplQueue = $rplQueue;
        $this->operatorStack = $operatorStack;
    }

    /**
     * @inheritDoc
     */
    public function getRplQueue()
    {
        return $this->rplQueue;
    }

    /**
     * @inheritDoc
     */
    public function getOperatorStack()
    {
        return $this->operatorStack;
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserRecordQueue $recordQueue)
    {
        while (false === $recordQueue->isEmpty()) {
            $recordQueue->dequeue()->accept($this);
        }

        while (false === $this->operatorStack->isEmpty()) {
            $record = $this->operatorStack->pop();
            if (false === $record->finish()) {
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
            if (false === $record->bracket($bracketRecord)) {
                $matchingBracketFound = true;
                break;
            }
            $this->rplQueue->enqueue($record);
        }

        if (false === $matchingBracketFound) {
            throw new UnclosedBracketException($this, $bracketRecord);
        }

        if (false === $this->operatorStack->isEmpty() && ($record = $this->operatorStack->top()) && $record instanceof FunctionOperatorParserRecord) {
            $this->operatorStack->pop();
            $this->rplQueue->enqueue($record);
        }

        //printf('Rpl: %s, Stack: %s%s', $this->rplQueue, $this->operatorStack, PHP_EOL);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionOperatorParserRecord $functionRecord)
    {
        $this->operatorStack->push($functionRecord);

        //printf('Rpl: %s, Stack: %s%s', $this->rplQueue, $this->operatorStack, PHP_EOL);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function operator(RegularOperatorParserRecord $operatorRecord)
    {
        while (false === $this->operatorStack->isEmpty() && ($record = $this->operatorStack->top()) && $record->operator($operatorRecord)) {
            $this->operatorStack->pop();
            $this->rplQueue->enqueue($record);
        }

        $this->operatorStack->push($operatorRecord);
        //printf('Rpl: %s, Stack: %s%s', $this->rplQueue, $this->operatorStack, PHP_EOL);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function terminal(TerminalParserRecord $terminalRecord)
    {
        $this->rplQueue->enqueue($terminalRecord);
        //printf('Rpl: %s, Stack: %s%s', $this->rplQueue, $this->operatorStack, PHP_EOL);

        return $this;
    }
}