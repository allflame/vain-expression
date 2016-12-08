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

namespace Vain\Expression\Parser\Module\Process;

use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Stack\ExpressionStack;

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
     * @var ExpressionStack
     */
    private $expressionStack;

    /**
     * @inheritDoc
     */
    public function withParser(ParserInterface $parser) : ParserProcessModuleInterface
    {
        $this->parser = $parser;

        return $this;
    }

    /**
     * @return ParserInterface
     */
    public function getParser() : ParserInterface
    {
        return $this->parser;
    }

    /**
     * @inheritDoc
     */
    public function withStack(ExpressionStack $expressionStack) : ParserProcessModuleInterface
    {
        $this->expressionStack = $expressionStack;

        return $this;
    }

    /**
     * @return ExpressionStack
     */
    public function getExpressionStack() : ExpressionStack
    {
        return $this->expressionStack;
    }
}
