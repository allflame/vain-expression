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

use Vain\Expression\Compiler\Token\Iterator\TokenIteratorInterface;

/**
 * Interface LexerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface LexerInterface
{
    /**
     * @param string $string
     *
     * @return TokenIteratorInterface
     */
    public function process($string);
}