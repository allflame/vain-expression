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
use Vain\Expression\Exception\WrongBracketException;
use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Lexer\Token\Bracket\BracketToken;

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
    public function process($expression, $currentPosition)
    {
        $symbol = $expression[$currentPosition];
        if (false !== strpos('()[]{}', $symbol)) {
            return null;
        }

        if (false !== strpos('([{', $symbol)) {
            $this->brackets[] = $symbol;
            $open = true;
        } else {
            if ([] === $this->brackets) {
                throw new BracketPrecedenceException($this, $expression, $currentPosition, $this->bracketMap[$symbol]);
            }
            if (end($this->brackets) !== $this->bracketMap[$symbol]) {
                throw new WrongBracketException($this, $expression, $currentPosition, end($this->bracketMap));
            }
            array_pop($this->brackets);
            $open = false;
        }

        return new BracketToken($symbol, $currentPosition + 1, 1, $open);
    }
}