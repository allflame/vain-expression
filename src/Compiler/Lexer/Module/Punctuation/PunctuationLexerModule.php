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
namespace Vain\Expression\Compiler\Lexer\Module\Punctuation;

use Vain\Expression\Compiler\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Compiler\Token\Punctuation\PunctuationToken;

/**
 * Class PunctuationLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PunctuationLexerModule extends AbstractLexerModule
{
    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        return (false !== strpos('.,?:', $string[$currentPosition]));
    }

    /**
     * @inheritDoc
     */
    public function process($string, $currentPosition)
    {
        return new PunctuationToken($string[$currentPosition], $currentPosition + 1, 1);
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}