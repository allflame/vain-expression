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
namespace Vain\Expression\Compiler\Composite;

use Vain\Expression\Compiler\Module\CompilerModuleInterface;
use Vain\Expression\Exception\DuplicateModuleException;
use Vain\Expression\Lexer\LexerInterface;

/**
 * Class Compiler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Compiler implements CompilerCompositeInterface
{
    private $modules;

    private $lexer;

    /**
     * Compiler constructor.
     *
     * @param LexerInterface            $lexer
     * @param CompilerModuleInterface[] $modules
     */
    public function __construct(LexerInterface $lexer, array $modules)
    {
        $this->lexer = $lexer;
        foreach ($modules as $module) {
            $this->registerCompiler($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function registerCompiler(CompilerModuleInterface $compilerModule)
    {
        foreach ($compilerModule->getTokens() as $token) {
            if (array_key_exists($token, $this->modules)) {
                throw new DuplicateModuleException($this, $compilerModule, $this->modules[$token], $token);
            }
            $this->modules[$token] = $compilerModule;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function compile($string)
    {
        $tokens = $this->lexer->process($string);
        
        
    }
}