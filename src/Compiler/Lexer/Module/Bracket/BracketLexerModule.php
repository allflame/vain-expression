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
namespace Vain\Expression\Compiler\Lexer\Module\Bracket;

use Vain\Expression\Compiler\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Compiler\Token\Bracket\BracketToken;

/**
 * Class BracketLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BracketLexerModule extends AbstractLexerModule
{
    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        return (false !== strpos('([{', $string[$currentPosition])) || (false !== strpos(')]}', $string[$currentPosition]));
    }

    /**
     * @inheritDoc
     */
    public function process($string, $currentPosition)
    {
        return new BracketToken($string[$currentPosition], $currentPosition + 1, 1);
    }
}