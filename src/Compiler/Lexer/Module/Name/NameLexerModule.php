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
namespace Vain\Expression\Compiler\Lexer\Module\Name;

use Vain\Expression\Compiler\Lexer\Module\AbstractLexerModule;
use Vain\Expression\Compiler\Token\Name\NameToken;

/**
 * Class NameLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NameLexerModule extends AbstractLexerModule
{
    /**
     * @inheritDoc
     */
    public function test($string, $currentPosition)
    {
        return 1 === preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/A', $string, $match, null, $currentPosition);
    }

    /**
     * @inheritDoc
     */
    public function process($string, $currentPosition)
    {
        preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/A', $string, $match, null, $currentPosition);
        
        return new NameToken($match[0], $currentPosition + 1, strlen($match[0]));
    }

    /**
     * @inheritDoc
     */
    public function consistent()
    {
        return true;
    }
}