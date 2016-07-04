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
    public function test($string, $currentPosition)
    {
        return (false !== strpos('0123456789.', $string[$currentPosition]));
    }

    /**
     * @inheritDoc
     */
    public function process($expression, $currentPosition)
    {
        $numberString = '';
        while (strlen($expression) > $currentPosition && $this->test($expression, $currentPosition)) {
            $numberString += $expression[$currentPosition];
            $currentPosition++;
        }
        if (PHP_INT_MAX > $number = (float) $numberString)  {

        }

        return new NumberToken($number, $currentPosition + 1, strlen($numberString));
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}