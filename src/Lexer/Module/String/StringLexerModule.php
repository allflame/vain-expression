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
use Vain\Expression\Lexer\Token\String\StringToken;

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
        return ctype_alnum($string[$currentPosition]);
    }

    /**
     * @inheritDoc
     */
    public function process($expression, $currentPosition)
    {
        $string = '';
        while (strlen($expression) > $currentPosition && $this->test($expression, $currentPosition)) {
            $string .= $expression[$currentPosition];
        }
        $stringLength = strlen($string);

        return new StringToken($string, $currentPosition + $stringLength, $stringLength);
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}