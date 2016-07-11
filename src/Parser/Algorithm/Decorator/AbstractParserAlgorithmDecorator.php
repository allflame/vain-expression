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
namespace Vain\Expression\Parser\Algorithm\Decorator;

use Vain\Expression\Parser\Algorithm\ParserAlgorithmInterface;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;

/**
 * Class AbstractParserAlgorithmDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractParserAlgorithmDecorator implements ParserAlgorithmInterface
{
    private $algorithm;

    /**
     * AbstractParserAlgorithmDecorator constructor.
     *
     * @param ParserAlgorithmInterface $algorithm
     */
    public function __construct(ParserAlgorithmInterface $algorithm)
    {
        $this->algorithm = $algorithm;
    }

    /**
     * @return ParserAlgorithmInterface
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @inheritDoc
     */
    public function getRplQueue()
    {
        return $this->algorithm->getRplQueue();
    }

    /**
     * @inheritDoc
     */
    public function getOperatorStack()
    {
        return $this->algorithm->getOperatorStack();
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserRecordQueue $recordQueue)
    {
        return $this->algorithm->parse($recordQueue);
    }

    /**
     * @inheritDoc
     */
    public function bracketX(BracketOperatorParserRecord $bracketRecord)
    {
        return $this->algorithm->bracketX($bracketRecord);
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionOperatorParserRecord $functionRecord)
    {
        return $this->algorithm->functionX($functionRecord);
    }

    /**
     * @inheritDoc
     */
    public function operator(RegularOperatorParserRecord $operatorRecord)
    {
        return $this->algorithm->operator($operatorRecord);
    }

    /**
     * @inheritDoc
     */
    public function terminal(TerminalParserRecord $terminalRecord)
    {
        return $this->algorithm->terminal($terminalRecord);
    }
}