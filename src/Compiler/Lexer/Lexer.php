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
namespace Vain\Expression\Compiler\Lexer;

use Vain\Expression\Compiler\Token\Eof\EofToken;
use Vain\Expression\Compiler\Token\Iterator\TokenIterator;
use Vain\Expression\Compiler\Token\Name\NameToken;
use Vain\Expression\Compiler\Token\Number\NumberToken;
use Vain\Expression\Compiler\Token\Operator\OperatorToken;
use Vain\Expression\Compiler\Token\Punctuation\PunctuationToken;
use Vain\Expression\Compiler\Token\String\StringToken;
use Vain\Expression\Exception\SyntaxErrorException;

/**
 * Class Lexer
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Lexer implements LexerInterface
{
    /**
     * @inheritDoc
     */
    public function process($string)
    {
        $expression = str_replace(["\r", "\n", "\t", "\v", "\f"], ' ', $string);
        $position = 0; $eof = strlen($expression);
        $tokens = $brackets = [];

        while ($position < $eof) {
            switch (true) {
                case (preg_match('/[0-9]+(?:\.[0-9]+)?/A', $expression, $match, null, $position)):
                    $number = (float) $match[0];  // floats
                    if (ctype_digit($match[0]) && $number <= PHP_INT_MAX) {
                        $number = (int) $match[0]; // integers lower than the maximum
                    }
                    $tokens[] = new NumberToken($number, $position + 1);
                    $position += strlen($match[0]);
                    break;
                case false !== strpos('([{', $expression[$position]):
                    $brackets[] = [$expression[$position], $position];
                    $tokens[] = new PunctuationToken($expression[$position], $position + 1);
                    ++$position;
                    break;
                case false !== strpos(')]}', $expression[$position]):
                    if ([] === $brackets) {
                        throw new SyntaxErrorException($this, $expression, $position, 'Unexpected character');
                    }
                    list($expect, $lastBracketPosition) = array_pop($brackets);
                    if ($expression[$position] != strtr($expect, '([{', ')]}')) {
                        throw new SyntaxErrorException($this, $expression, $lastBracketPosition, sprintf('Unclosed "%s"', $expect));
                    }
                    $tokens[] = new PunctuationToken($expression[$position], $position + 1);
                    ++$position;
                    break;
                case preg_match('/"([^"\\\\]*(?:\\\\.[^"\\\\]*)*)"|\'([^\'\\\\]*(?:\\\\.[^\'\\\\]*)*)\'/As', $expression, $match, null, $position):
                    $tokens[] = new StringToken(stripcslashes(substr($match[0], 1, -1)), $position + 1);
                    $position += strlen($match[0]);
                    break;
                case preg_match('/not in(?=[\s(])|\!\=\=|not(?=[\s(])|and(?=[\s(])|\=\=\=|\>\=|or(?=[\s(])|\<\=|\*\*|\.\.|in(?=[\s(])|&&|\|\||matches|\=\=|\!\=|\*|~|%|\/|\>|\||\!|\^|&|\+|\<|\-/A', $expression, $match, null, $position):
                    $tokens[] = new OperatorToken($match[0], $position + 1);
                    $position += strlen($match[0]);
                    break;
                case (false !== strpos('.,?:', $expression[$position])):
                    // punctuation
                    $tokens[] = new PunctuationToken($expression[$position], $position + 1);
                    ++$position;
                    break;
                case preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/A', $expression, $match, null, $position):
                    $tokens[] = new NameToken($match[0], $position + 1);
                    $position += strlen($match[0]);
                    break;
                default:
                    throw new SyntaxErrorException($this, $expression, $position, sprintf('Unexpected character "%s"', $expression[$position]));
            }
        }

        $tokens[] = new EofToken(null, $position + 1);
        if ([] !== $brackets) {
            list($expect, $lastBracketPosition) = array_pop($brackets);
            throw new SyntaxErrorException($this, $expression, $lastBracketPosition, sprintf('Unclosed "%s"', $expect));
        }

        return new TokenIterator($tokens);
    }
}