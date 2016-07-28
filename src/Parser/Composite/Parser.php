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

use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;
use Vain\Expression\Parser\Algorithm\ParserAlgorithmInterface;
use Vain\Expression\Parser\Module\ParserModuleInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;
use Vain\Expression\Stack\ExpressionStack;

/**
 * Class Parser
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Parser implements ParserCompositeInterface, ParserInterface
{
    /**
     * @var ParserModuleInterface[]
     */
    private $modules;

    private $recordQueue;

    private $expressionStack;

    private $algorithm;

    /**
     * Parser constructor.
     *
     * @param ParserRecordQueue         $recordQueue
     * @param ExpressionStack           $expressionStack
     * @param ParserAlgorithmInterface $algorithm
     * @param ParserModuleInterface[]   $modules
     */
    public function __construct(
        ParserRecordQueue $recordQueue,
        ExpressionStack $expressionStack,
        ParserAlgorithmInterface $algorithm,
        array $modules = []
    ) {
        $this->recordQueue = $recordQueue;
        $this->expressionStack = $expressionStack;
        foreach ($modules as $module) {
            $this->addModule($module);
        }
        $this->algorithm = $algorithm;
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

        $rplQueue = $this->algorithm->parse($this->recordQueue);

        while (false === $rplQueue->isEmpty()) {
            $record = $rplQueue->dequeue();
            $record->getModule()->process($this, $record->getToken(), $this->expressionStack);
        }

        return $this->expressionStack->pop();
    }
}