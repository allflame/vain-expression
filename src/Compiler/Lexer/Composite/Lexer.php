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
namespace Vain\Expression\Compiler\Lexer\Composite;

use Vain\Expression\Compiler\Lexer\Composite\Queue\LexerQueue;
use Vain\Expression\Compiler\Lexer\Module\LexerModuleInterface;
use Vain\Expression\Compiler\Token\Eof\EofToken;
use Vain\Expression\Compiler\Token\Iterator\TokenIterator;
use Vain\Expression\Exception\SyntaxErrorException;

/**
 * Class Lexeruse Vain\Expression\Compiler\Lexer\LexerInterface;

 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Lexer implements LexerCompositeInterface
{

    private $queue;

    /**
     * Lexer constructor.
     *
     * @param LexerModuleInterface[] $modules
     */
    public function __construct(array $modules)
    {
        $this->queue = new LexerQueue();
        foreach ($modules as $module) {
            $this->queue->insert($module, $module->getPriority());
        }
    }

    /**
     * @inheritDoc
     */
    public function registerLexer(LexerModuleInterface $module)
    {
        $this->queue->insert($module, $module->getPriority());

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
            $current = $this->queue->top();
            while (null !== $current) {
                if (false === $current->test($expression, $position)) {
                    $current = $this->queue->next();
                    continue;
                }
                $token = $current->process($expression, $position);
                $tokens[] = $token;
                $position += $token->getLength();
                $this->queue->rewind();
            }
            
            if (null === $current) {
                throw new SyntaxErrorException($this, $expression, $position, sprintf('Unexpected character "%s"', $expression[$position]));
            }
        }
//            switch (true) {
//                case false !== strpos('([{', $expression[$position]):
//                    $brackets[] = [$expression[$position], $position];
//                    $tokens[] = new PunctuationToken($expression[$position], $position + 1);
//                    ++$position;
//                    break;
//                case false !== strpos(')]}', $expression[$position]):
//                    if ([] === $brackets) {
//                        throw new SyntaxErrorException($this, $expression, $position, 'Unexpected character');
//                    }
//                    list($expect, $lastBracketPosition) = array_pop($brackets);
//                    if ($expression[$position] != strtr($expect, '([{', ')]}')) {
//                        throw new SyntaxErrorException($this, $expression, $lastBracketPosition, sprintf('Unclosed "%s"', $expect));
//                    }
//                    $tokens[] = new PunctuationToken($expression[$position], $position + 1);
//                    ++$position;
//                    break;
//            }

        $tokens[] = new EofToken(null, $position + 1, 0);
//        if ([] !== $brackets) {
//            list($expect, $lastBracketPosition) = array_pop($brackets);
//            throw new SyntaxErrorException($this, $expression, $lastBracketPosition, sprintf('Unclosed "%s"', $expect));
//        }

        return new TokenIterator($tokens);
    }
}