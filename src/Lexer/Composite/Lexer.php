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
namespace Vain\Expression\Lexer\Composite;

use Vain\Expression\Exception\DuplicatePriorityException;
use Vain\Expression\Lexer\Module\LexerModuleInterface;
use Vain\Expression\Token\Eof\EofToken;
use Vain\Expression\Token\Iterator\TokenIterator;
use Vain\Expression\Exception\SyntaxErrorException;

/**
 * Class Lexer

 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Lexer implements LexerCompositeInterface
{

    /**
     * @var LexerModuleInterface[]
     */
    private $modules = [];

    /**
     * Lexer constructor.
     *
     * @param LexerModuleInterface[] $modules
     */
    public function __construct(array $modules = [])
    {
        foreach ($modules as $module) {
            $this->registerLexer($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function registerLexer(LexerModuleInterface $module)
    {
        $priority = $module->getPriority();
        if (array_key_exists($module->getPriority(), $this->modules)) {
            throw new DuplicatePriorityException($this, $module, $this->modules[$priority]);
        }
        $this->modules[$priority] = $module;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function process($string)
    {
        $expression = str_replace(["\r", "\n", "\t", "\v", "\f"], ' ', $string);
        $position = 0; $eof = strlen($expression);
        $tokens = $brackets = [];

        while ($position < $eof) {
            foreach ($this->modules as $module) {
                if (false === $module->test($expression, $position)) {
                    continue;
                }
                $token = $module->process($expression, $position);
                $tokens[] = $token;
                $position += $token->getLength();
                break;
            }
        }

        foreach ($this->modules as $module) {
            if (false === $module->consistent()) {
                throw new SyntaxErrorException($this, $expression, $eof, sprintf('Module %s reported inconsistent state', get_class($module)));
            }
        }
        $tokens[] = new EofToken(null, $position + 1, 0);

        return new TokenIterator($tokens);
    }
}