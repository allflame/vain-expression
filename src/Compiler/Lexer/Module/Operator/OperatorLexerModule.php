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
namespace Vain\Expression\Compiler\Lexer\Module\Operator;

use Vain\Expression\Compiler\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Compiler\Token\Operator\OperatorToken;

/**
 * Class OperatorLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperatorLexerModule extends AbstractLexerModule
{
    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        return preg_match('/not in(?=[\s(])|\!\=\=|not(?=[\s(])|and(?=[\s(])|\=\=\=|\>\=|or(?=[\s(])|\<\=|\*\*|\.\.|in(?=[\s(])|&&|\|\||matches|\=\=|\!\=|\*|~|%|\/|\>|\||\!|\^|&|\+|\<|\-/A', $string, $match, null, $currentPosition);
    }

    /**
     * @inheritDoc
     */
    public function process($string, $currentPosition)
    {
        preg_match('/not in(?=[\s(])|\!\=\=|not(?=[\s(])|and(?=[\s(])|\=\=\=|\>\=|or(?=[\s(])|\<\=|\*\*|\.\.|in(?=[\s(])|&&|\|\||matches|\=\=|\!\=|\*|~|%|\/|\>|\||\!|\^|&|\+|\<|\-/A', $string, $match, null, $currentPosition);

        new OperatorToken($match[0], $currentPosition + 1, strlen($match[0]));
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}