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

namespace Vain\Expression\Parser\Algorithm\Dijkstra\Engine;

use Vain\Expression\Parser\Record\Operator\OperatorParserRecordInterface;
use Vain\Expression\Parser\Record\Operator\Stack\ParserOperatorRecordStack;
use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;

/**
 * Class AbstractDijkstraEngine
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDijkstraEngine implements DijkstraEngineInterface
{
    private $operatorStack;
    
    private $rplQueue;
    
    private $record;

    /**
     * @inheritDoc
     */
    public function withRecord(OperatorParserRecordInterface $record)
    {
        $this->record = $record;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withOperatorStack(ParserOperatorRecordStack $operatorStack)
    {
        $this->operatorStack = $operatorStack;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withRplQueue(ParserRecordQueue $recordQueue)
    {
        $this->rplQueue = $recordQueue;

        return $this;
    }

    /**
     * @return ParserOperatorRecordStack
     */
    public function getOperatorStack()
    {
        return $this->operatorStack;
    }

    /**
     * @return ParserRecordQueue
     */
    public function getRplQueue()
    {
        return $this->rplQueue;
    }

    /**
     * @return OperatorParserRecordInterface
     */
    public function getRecord()
    {
        return $this->record;
    }
}