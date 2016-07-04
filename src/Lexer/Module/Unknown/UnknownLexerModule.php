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
namespace Vain\Expression\Lexer\Module\Unknown;

use Vain\Expression\Exception\UnknownCharacterException;
use Vain\Expression\Lexer\Module\AbstractLexerModule;

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
    public function test($string, $currentPosition)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function process($expression, $currentPosition)
    {
        throw new UnknownCharacterException($this, $expression, $currentPosition);
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}