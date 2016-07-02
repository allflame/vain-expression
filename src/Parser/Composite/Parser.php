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

use Vain\Expression\Lexer\LexerInterface;
use Vain\Expression\Parser\Module\ParserModuleInterface;

/**
 * Class Parser
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Parser implements ParserCompositeInterface
{
    private $modules;

    private $lexer;

    private $expression;

    /**
     * Compiler constructor.
     *
     * @param LexerInterface            $lexer
     * @param ParserModuleInterface[] $modules
     */
    public function __construct(LexerInterface $lexer, array $modules = [])
    {
        $this->lexer = $lexer;
        foreach ($modules as $module) {
            $this->addModule($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function addModule(ParserModuleInterface $module)
    {
//        foreach ($module->getTokens() as $token) {
//            if (array_key_exists($token, $this->modules)) {
//                throw new DuplicateModuleException($this, $compilerModule, $this->modules[$token], $token);
//            }
//            $this->modules[$token] = $compilerModule;
//        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function parse($string)
    {
        $tokenIterator =  $this->lexer->process($string);


    }
}