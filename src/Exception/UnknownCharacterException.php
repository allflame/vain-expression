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
namespace Vain\Expression\Exception;

use Vain\Expression\Lexer\Module\LexerModuleInterface;

/**
 * Class UnknownCharacterException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownCharacterException extends LexerModuleException
{
    /**
     * UnknownCharacterException constructor.
     *
     * @param LexerModuleInterface $module
     * @param string               $string
     * @param int                  $position
     */
    public function __construct(LexerModuleInterface $module, $string, $position)
    {
        parent::__construct($module, sprintf('Unexpected character "%s" at position #%d in string %s: ', $string[$position], $position, $string), 0, null);
    }
}