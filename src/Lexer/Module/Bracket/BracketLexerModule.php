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
namespace Vain\Expression\Lexer\Module\Bracket;

use Vain\Expression\Exception\BracketPrecedenceException;
use Vain\Expression\Exception\UnclosedBracketException;
use Vain\Expression\Exception\WrongBracketException;
use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Token\Bracket\BracketToken;

/**
 * Class BracketLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BracketLexerModule extends AbstractLexerModule
{
    private $brackets = [];

    private $bracketMap = [
        ')' => '(',
        ']' => '[',
        '}' => '{',
    ];

    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        $symbol = $string[$currentPosition];

        if (false !== strpos('()[]{}', $symbol)) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function process($string, $currentPosition)
    {
        $symbol = $string[$currentPosition];
        if (false !== strpos('([{', $symbol)) {
            $this->brackets[] = $symbol;
            $open = true;
        } else {
            if ([] === $this->brackets) {
                throw new BracketPrecedenceException($this, $string, $currentPosition, $this->bracketMap[$symbol]);
            }
            if (end($this->brackets) !== $this->bracketMap[$symbol]) {
                throw new WrongBracketException($this, $string, $currentPosition, end($this->bracketMap));
            }
            array_pop($this->brackets);
            $open = false;
        }

        return new BracketToken($symbol, $currentPosition + 1, 1, $open);
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        if (0 !== count($this->brackets)) {
            throw new UnclosedBracketException($this, $this->brackets);
        }

        return true;
    }
}