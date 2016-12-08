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

namespace Vain\Expression\Lexer\Composite;

use Vain\Expression\Exception\DuplicatePriorityException;
use Vain\Expression\Lexer\LexerInterface;
use Vain\Expression\Lexer\Module\LexerModuleInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIterator;
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;

/**
 * Class Lexer
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Lexer implements LexerCompositeInterface, LexerInterface
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
            $this->addModule($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function addModule(LexerModuleInterface $module) : LexerCompositeInterface
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
    public function process(string $string) : TokenIteratorInterface
    {
        $expression = str_replace(["\r", "\n", "\t", "\v", "\f"], ' ', $string);
        $position = 0;
        $eof = strlen($expression);
        $tokens = [];
        krsort($this->modules);
        while ($position < $eof) {
            if (' ' === $expression[$position]) {
                ++$position;
                continue;
            }

            foreach ($this->modules as $module) {
                if (null === ($token = $module->process($expression, $position))) {
                    continue;
                }
                $tokens[] = $token;
                $position += $token->getLength();
                break;
            }
        }

        return new TokenIterator($tokens);
    }
}
