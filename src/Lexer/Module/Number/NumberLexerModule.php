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
use Vain\Expression\Lexer\Token\Number\NumberToken;

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
    public function process($expression, $currentPosition)
    {
        $numberString = '';
        while (strlen($expression) > $currentPosition && false !== strpos('0123456789.', $expression[$currentPosition])) {
            $numberString .= $expression[$currentPosition];
            $currentPosition++;
        }

        if ('' === $numberString || PHP_INT_MAX < $number = (float) $numberString) {
            return null;
        }
        $numberLength = strlen($numberString);

        return new NumberToken($number, $currentPosition - $numberLength, $numberLength);
    }
}