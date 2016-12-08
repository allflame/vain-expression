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
declare(strict_types = 1);

namespace Vain\Expression\Lexer\Module\Operator;

use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Lexer\Token\TokenInterface;

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
        '/' => true,
        '|' => true,
        '=' => true,
        '&' => true,
        '!' => true,
        '>' => true,
        '<' => true,
        '%' => true,
        '^' => true,
    ];

    /**
     * @inheritDoc
     */
    public function process(string $expression, int $currentPosition) : TokenInterface
    {
        if (false === array_key_exists($expression[$currentPosition], self::OPERATORS)) {
            return null;
        }

        $operator = '';
        while (strlen($expression) > $currentPosition
               && array_key_exists(
                   $expression[$currentPosition],
                   self::OPERATORS
               )) {
            $operator .= $expression[$currentPosition];
            $currentPosition++;
        }

        if ('' === $operator) {
            return null;
        }

        $operatorLength = strlen($operator);

        return new OperatorToken($operator, $currentPosition - $operatorLength, $operatorLength);
    }
}
