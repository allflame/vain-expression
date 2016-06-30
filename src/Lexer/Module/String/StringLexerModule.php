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
namespace Vain\Expression\Lexer\Module\String;

use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Token\String\StringToken;

/**
 * Class StringLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class StringLexerModule extends AbstractLexerModule
{
    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        return 1 === preg_match('/"([^"\\\\]*(?:\\\\.[^"\\\\]*)*)"|\'([^\'\\\\]*(?:\\\\.[^\'\\\\]*)*)\'/As', $string, $match, null, $currentPosition);
    }

    /**
     * @inheritDoc
     */
    public function process($string, $currentPosition)
    {
        preg_match('/"([^"\\\\]*(?:\\\\.[^"\\\\]*)*)"|\'([^\'\\\\]*(?:\\\\.[^\'\\\\]*)*)\'/As', $string, $match, null, $currentPosition);

        return new StringToken(stripcslashes(substr($match[0], 1, -1)), $currentPosition + 1, strlen($match[0]));
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}