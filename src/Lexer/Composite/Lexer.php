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
use Vain\Expression\Exception\InconsistentStateException;
use Vain\Expression\Lexer\Module\LexerModuleInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIterator;

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
            $this->addModule($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function addModule(LexerModuleInterface $module)
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
        krsort($this->modules);
        while ($position < $eof) {
            if (' ' === $expression[$position]) {
                ++$position;
                continue;
            }

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
                throw new InconsistentStateException($this, $module);
            }
        }

        return new TokenIterator($tokens);
    }
}