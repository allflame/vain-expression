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
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\Module\ParserModuleInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Stack\ParserOperatorRecordStack;
use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;

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

    /**
     * @var ExpressionInterface
     */
    private $expression;

    private $recordQueue;

    private $rplQueue;

    private $operatorStack;

    /**
     * Parser constructor.
     *
     * @param ParserRecordQueue         $recordQueue
     * @param ParserRecordQueue         $rplQueue
     * @param ParserOperatorRecordStack $operatorStack
     * @param ParserModuleInterface[]   $modules
     */
    public function __construct(
        ParserRecordQueue $recordQueue,
        ParserRecordQueue $rplQueue,
        ParserOperatorRecordStack $operatorStack,
        array $modules = []
    ) {
        $this->rplQueue = $rplQueue;
        $this->operatorStack = $operatorStack;
        $this->recordQueue = $recordQueue;
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
    public function getExpression()
    {
        return $this->expression;
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
            $this->rplQueue->push($record);
            $this->operatorStack->pop();
        }
        if (null === $record) {
            throw new UnclosedBracketException($this, $bracketRecord);
        }
        $this->operatorStack->pop();
        if (null !== ($record = $this->operatorStack->pop() && $record->bracket($bracketRecord))) {
            $this->rplQueue->push($record);
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
        $record = $this->operatorStack->top();
        while (null !== $record && $record->operator($operatorRecord)) {
            $this->rplQueue->push($operatorRecord);
            $this->operatorStack->pop();
        }
        $this->operatorStack->push($operatorRecord);
    }

    /**
     * @inheritDoc
     */
    public function terminal(TerminalParserRecord $terminalRecord)
    {
        $this->rplQueue->push($terminalRecord);
    }

    /**
     * @inheritDoc
     */
    public function parse(TokenIteratorInterface $iterator)
    {
        $token = $iterator->current();
        while ($iterator->valid()) {
            foreach ($this->modules as $module) {
                if (null === ($record = $module->translate($token))) {
                    continue;
                }
                $this->recordQueue->push($record->withModule($module));
                $iterator->next();
                break;
            }
        }

        while ($this->recordQueue->valid()) {
            $this->recordQueue->pop()->accept($this);
        }

        while ($this->operatorStack->valid()) {
            $record = $this->operatorStack->pop();
            if (false === $record->finish()) {
                throw new UnclosedBracketException($this, $record);
            }
            $this->rplQueue->push($record);
        }

        return $this->rplQueue;
//        while ($this->rpl->valid()) {
//            $record = $this->rpl->pop();
//            foreach ($this->modules as $module) {
//                if (false === $module->process($this, $record)) {
//                    continue;
//                }
//                $this->expression = $module->process($this, $iterator);
//                break;
//            }
//        }
//
//        return $this;
    }
}