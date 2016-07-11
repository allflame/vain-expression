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
namespace Vain\Expression\Parser\Algorithm\Decorator\Logger;

use Vain\Expression\Parser\Algorithm\Decorator\AbstractParserAlgorithmDecorator;
use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Vain\Expression\Parser\Algorithm\ParserAlgorithmInterface;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;

/**
 * Class ParserAlgorithmLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ParserAlgorithmLoggerDecorator extends AbstractParserAlgorithmDecorator
{
    private $logger;

    /**
     * ParserAlgorithmLoggerDecorator constructor.
     *
     * @param ParserAlgorithmInterface $algorithm
     * @param PsrLoggerInterface       $logger
     */
    public function __construct(ParserAlgorithmInterface $algorithm, PsrLoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($algorithm);
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserRecordQueue $recordQueue)
    {
        $result = parent::parse($recordQueue);
        
        $this->logger->debug(sprintf('Rpl: %s, Stack: %s%s', $this->getRplQueue(), $this->getOperatorStack(), PHP_EOL));

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function bracketX(BracketOperatorParserRecord $bracketRecord)
    {
        $result =  parent::bracketX($bracketRecord);

        $this->logger->debug(sprintf('Rpl: %s, Stack: %s%s', $this->getRplQueue(), $this->getOperatorStack(), PHP_EOL));

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionOperatorParserRecord $functionRecord)
    {
        $result =  parent::functionX($functionRecord);

        $this->logger->debug(sprintf('Rpl: %s, Stack: %s%s', $this->getRplQueue(), $this->getOperatorStack(), PHP_EOL));

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function operator(RegularOperatorParserRecord $operatorRecord)
    {
        $result = parent::operator($operatorRecord);

        $this->logger->debug(sprintf('Rpl: %s, Stack: %s%s', $this->getRplQueue(), $this->getOperatorStack(), PHP_EOL));

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function terminal(TerminalParserRecord $terminalRecord)
    {
        $result =  parent::terminal($terminalRecord);

        $this->logger->debug(sprintf('Rpl: %s, Stack: %s%s', $this->getRplQueue(), $this->getOperatorStack(), PHP_EOL));

        return $result;
    }
}