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
namespace Vain\Expression\Lexer\Composite;

use Vain\Expression\Lexer\Module\LexerModuleInterface;

/**
 * Interface LexerCompositeInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface LexerCompositeInterface
{
    /**
     * @param LexerModuleInterface $module
     *
     * @return LexerCompositeInterface
     */
    public function addModule(LexerModuleInterface $module);
}