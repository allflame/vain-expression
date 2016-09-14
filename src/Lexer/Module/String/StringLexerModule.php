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

namespace Vain\Expression\Lexer\Module\String;

use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Lexer\Token\String\StringToken;
use Vain\Expression\Lexer\Token\TokenInterface;

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
    public function process(string $expression, int $currentPosition) : TokenInterface
    {
        $string = '';
        while (strlen($expression) > $currentPosition && ctype_alnum($expression[$currentPosition])) {
            $string .= $expression[$currentPosition];
            $currentPosition++;
        }
        if ('' === $string) {
            return null;
        }
        $stringLength = strlen($string);

        return new StringToken($string, $currentPosition - $stringLength, $stringLength);
    }
}