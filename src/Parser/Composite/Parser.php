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
namespace Vain\Expression\Parser\Composite;

use Vain\Expression\Exception\UnclosedBracketException;
use Vain\Expression\Parser\Module\ParserModuleInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Stack\ParserOperatorRecordStack;
use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;
use Vain\Expression\Stack\ExpressionStack;

/**
 * Class Parser
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Parser implements ParserCompositeInterface
{
    /**
     * @var ParserModuleInterface[]
     */
    private $modules;

    private $expressionStack;

    private $recordQueue;

    private $rplQueue;

    private $operatorStack;

    /**
     * Parser constructor.
     *
     * @param ParserRecordQueue         $recordQueue
     * @param ParserRecordQueue         $rplQueue
     * @param ParserOperatorRecordStack $operatorStack
     * @param ExpressionStack           $expressionStack
     * @param ParserModuleInterface[]   $modules
     */
    public function __construct(
        ParserRecordQueue $recordQueue,
        ParserRecordQueue $rplQueue,
        ParserOperatorRecordStack $operatorStack,
        ExpressionStack $expressionStack,
        array $modules = []
    ) {
        $this->rplQueue = $rplQueue;
        $this->operatorStack = $operatorStack;
        $this->recordQueue = $recordQueue;
        $this->expressionStack = $expressionStack;
        foreach ($modules as $module) {
            $this->addModule($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function addModule(ParserModuleInterface $module)
    {
        $this->modules[] = $module;

        return $this;
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
        $record = $this->operatorStack->top();
        while (null !== $record && $record->bracket($bracketRecord)) {
            $this->rplQueue->enqueue($record);
            $this->operatorStack->pop();
        }
        if (null === $record) {
            throw new UnclosedBracketException($this, $bracketRecord);
        }
        $this->operatorStack->pop();
        if (null !== ($record = $this->operatorStack->pop() && $record->bracket($bracketRecord))) {
            $this->rplQueue->enqueue($record);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionOperatorParserRecord $functionRecord)
    {
        $this->operatorStack->push($functionRecord);
    }

    /**
     * @inheritDoc
     */
    public function operator(RegularOperatorParserRecord $operatorRecord)
    {
        while (null !== ($record = $this->operatorStack->current()) && $record->operator($operatorRecord)) {
            $this->operatorStack->pop();
            $this->rplQueue->enqueue($record);
        }
        $this->operatorStack->push($operatorRecord);
    }

    /**
     * @inheritDoc
     */
    public function terminal(TerminalParserRecord $terminalRecord)
    {
        $this->rplQueue->enqueue($terminalRecord);
    }

    /**
     * @inheritDoc
     */
    public function parse(TokenIteratorInterface $iterator)
    {
        while ($iterator->valid()) {
            $token = $iterator->current();
            foreach ($this->modules as $module) {
                if (null === ($record = $module->translate($token))) {
                    continue;
                }
                $this->recordQueue->enqueue($record->withModule($module));
                break;
            }
            $iterator->next();
        }

        while (false === $this->recordQueue->isEmpty()) {
            $this->recordQueue->dequeue()->accept($this);
        }

        while (false === $this->operatorStack->isEmpty()) {
            $record = $this->operatorStack->pop();
            if (false === $record->finish()) {
                throw new UnclosedBracketException($this, $record);
            }
            $this->rplQueue->enqueue($record);
        }
        
        while (false === $this->rplQueue->isEmpty()) {
            $record = $this->rplQueue->dequeue();
            $record->getModule()->process($this, $record->getToken(), $this->expressionStack);
        }

        return $this->expressionStack->pop();
    }
}