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
namespace Vain\Expression\Lexer\Module;

use Vain\Expression\Lexer\Token\TokenInterface;

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
     * @param string $expression
     * @param int    $currentPosition
     *
     * @return TokenInterface
     */
    public function process($expression, $currentPosition);
}