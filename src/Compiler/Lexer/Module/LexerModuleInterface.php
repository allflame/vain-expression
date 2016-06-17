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
namespace Vain\Expression\Compiler\Lexer\Module;

use Vain\Expression\Compiler\Token\TokenInterface;

/**
 * Interface LexerModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface LexerModuleInterface
{
    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param string $string
     * @param int $currentPosition
     *
     * @return boolean
     */
    public function test($string, $currentPosition);

    /**
     * @param string $string
     * @param int $currentPosition
     *
     * @return TokenInterface
     */
    public function process($string, $currentPosition);
}