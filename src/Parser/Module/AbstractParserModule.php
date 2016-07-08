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
use Vain\Expression\Parser\Translate\ParserTranslateModuleInterface;

/**
 * Class AbstractParserModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractParserModule implements ParserModuleInterface
{
    private $translate;

    private $init;

    private $process;

    /**
     * AbstractParserModule constructor.
     *
     * @param ParserTranslateModuleInterface $translate
     */
    public function __construct(ParserTranslateModuleInterface $translate)
    {
        $this->translate = $translate;
//        $this->init = $init;
//        $this->process = $process;
    }

//    /**
//     * @inheritDoc
//     */
//    public function rpl(TokenInterface $token, \SplStack $rpl, \SplStack $operators, $precedence)
//    {
//        return $token->accept($this->init->withRpl($rpl)->withOperators($operators)->withPrecedence($precedence)->withProcessModule($this->process));
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function process(ParserInterface $parser, TokenIteratorInterface $iterator)
//    {
//        return $this->process->withParser($parser)->withIterator($iterator)->process();
//    }
    /**
     * @inheritDoc
     */
    public function translate(TokenInterface $token)
    {
        return $token->accept($this->translate);
    }
}