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
namespace Vain\Expression\Lexer\Module\Punctuation;

use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;

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
    public function process($expression, $currentPosition)
    {
        if (false === strpos('.,?:', $expression[$currentPosition])) {
            return null;
        }

        return new PunctuationToken($expression[$currentPosition], $currentPosition + 1, 1);
    }
}