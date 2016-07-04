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
namespace Vain\Expression\Parser\Module;

use Vain\Expression\Parser\Module\Init\ParserInitModuleInterface;
use Vain\Expression\Parser\Module\Process\ParserProcessModuleInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;
use Vain\Expression\Lexer\Token\TokenInterface;

/**
 * Class AbstractParserModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractParserModule implements ParserModuleInterface
{
    private $init;

    private $process;

    /**
     * AbstractParserModule constructor.
     *
     * @param ParserInitModuleInterface    $init
     * @param ParserProcessModuleInterface $process
     */
    public function __construct(ParserInitModuleInterface $init, ParserProcessModuleInterface $process)
    {
        $this->init = $init;
        $this->process = $process;
    }

    /**
     * @inheritDoc
     */
    public function start(TokenInterface $token)
    {
        return $token->accept($this->init);
    }

    /**
     * @inheritDoc
     */
    public function process(ParserInterface $parser, TokenIteratorInterface $iterator)
    {
        return $this->process->withParser($parser)->withIterator($iterator)->process();
    }
}