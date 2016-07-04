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
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;

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
     * @var TokenIteratorInterface
     */
    private $iterator;


    /**
     * @inheritDoc
     */
    public function withParser(ParserInterface $parser)
    {
        $this->parser = $parser;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withIterator(TokenIteratorInterface $iterator)
    {
        $this->iterator = $iterator;

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
     * @return TokenIteratorInterface
     */
    public function getIterator()
    {
        return $this->iterator;
    }

    /**
     * @inheritDoc
     */
    public function process()
    {
        $currentToken = $this->getIterator()->current();

        return $currentToken->accept($this);
    }
}