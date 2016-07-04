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
namespace Vain\Expression\Lexer\Module\Operator;

use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Lexer\Token\Operator\OperatorToken;

/**
 * Class OperatorLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperatorLexerModule extends AbstractLexerModule
{
    const OPERATORS = [
        '+' => true,
        '-' => true,
        '*' => true,
        '**' => true,
        '/' => true,
        '|' => true,
        '||' => true,
        '&' => true,
        '&&' => true,
        '==' => true,
        '!' => true,
        '!=' => true,
        '>' => true,
        '>=' => true,
        '<' => true,
        '<=' => true,
        '%%' => true,
    ];

    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        return array_key_exists($string[$currentPosition], self::OPERATORS);
    }

    /**
     * @inheritDoc
     */
    public function process($expression, $currentPosition)
    {
        if (strlen($expression) < $currentPosition + 1) {
            $twoSymbolOperator = substr($expression, $currentPosition, 2);
            if (false === array_key_exists($twoSymbolOperator, self::OPERATORS)) {
                return new OperatorToken($expression[$currentPosition], $currentPosition + 1, 1);
            }

            return new OperatorToken($expression[$currentPosition], $currentPosition + 2, 2);
        }

        return new OperatorToken($expression[$currentPosition], $currentPosition + 1, 1);
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}