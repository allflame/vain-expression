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

namespace Vain\Expression\Lexer\Module\Unknown;

use Vain\Expression\Exception\UnknownCharacterException;
use Vain\Expression\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Lexer\Token\TokenInterface;

/**
 * Class UnknownLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownLexerModule extends AbstractLexerModule
{
    /**
     * @inheritDoc
     */
    public function process(string $expression, int $currentPosition) : TokenInterface
    {
        throw new UnknownCharacterException($this, $expression, $currentPosition);
    }
}
