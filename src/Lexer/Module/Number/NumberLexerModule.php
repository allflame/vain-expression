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
namespace Vain\Expression\Lexer\Module\Number;

use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Token\Number\NumberToken;

/**
 * Class NumberLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NumberLexerModule extends AbstractLexerModule
{
    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        return (1 === preg_match('/[0-9]+(?:\.[0-9]+)?/A', $string, $match, null, $currentPosition));
    }

    /**
     * @inheritDoc
     */
    public function process($string, $currentPosition)
    {
        preg_match('/[0-9]+(?:\.[0-9]+)?/A', $string, $match, null, $currentPosition);

        $number = (float) $match[0];
        if (ctype_digit($match[0]) && $number <= PHP_INT_MAX) {
            $number = (int) $match[0];
        }

        return new NumberToken($number, $currentPosition + 1, strlen($match[0]));
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}