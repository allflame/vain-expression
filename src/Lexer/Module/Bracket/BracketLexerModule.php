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

        if (false !== strpos('([{', $symbol)) {
            return true;
        }

        if (false !== strpos(')]}', $symbol) && end($this->brackets) === $this->bracketMap[$symbol]) {
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
        } else {
            array_pop($this->brackets);
        }

        return new BracketToken($symbol, $currentPosition + 1, 1);
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return (0 === count($this->brackets));
    }
}