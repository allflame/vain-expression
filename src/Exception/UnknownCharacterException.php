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
class UnknownCharacterException extends SyntaxErrorException
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
        parent::__construct(
            $module,
            $string,
            $position,
            sprintf('Unexpected character "%s"', $string[$position]),
            0,
            null
        );
    }
}