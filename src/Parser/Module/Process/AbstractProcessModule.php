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
namespace Vain\Expression\Parser\Module\Process;

use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Queue\ExpressionQueue;

/**
 * Class AbstractProcessModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractProcessModule implements ParserProcessModuleInterface
{
    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * @var ExpressionQueue
     */
    private $expressionQueue;


    /**
     * @inheritDoc
     */
    public function withParser(ParserInterface $parser)
    {
        $this->parser = $parser;

        return $this;
    }

    /**
     * @return ParserInterface
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * @inheritDoc
     */
    public function withQueue(ExpressionQueue $expressionQueue)
    {
        $this->expressionQueue = $expressionQueue;

        return $this;
    }

    /**
     * @return ExpressionQueue
     */
    public function getExpressionQueue()
    {
        return $this->expressionQueue;
    }
}