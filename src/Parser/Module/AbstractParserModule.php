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

use Vain\Expression\Lexer\Token\TokenInterface;
use Vain\Expression\Parser\Module\Process\ParserProcessModuleInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Parser\Translate\ParserTranslateModuleInterface;
use Vain\Expression\Queue\ExpressionQueue;

/**
 * Class AbstractParserModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractParserModule implements ParserModuleInterface
{
    private $translate;

    private $process;

    /**
     * AbstractParserModule constructor.
     *
     * @param ParserTranslateModuleInterface $translate
     * @param ParserProcessModuleInterface $process
     */
    public function __construct(ParserTranslateModuleInterface $translate, ParserProcessModuleInterface $process)
    {
        $this->translate = $translate;
        $this->process = $process;
    }

    /**
     * @inheritDoc
     */
    public function translate(TokenInterface $token)
    {
        return $token->accept($this->translate);
    }

    /**
     * @inheritDoc
     */
    public function process(ParserInterface $parser, TokenInterface $token, ExpressionQueue $queue)
    {
        $queue->enqueue($token->accept($this->process->withQueue($queue)));

        return $this;
    }
}