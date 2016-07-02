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
 * Class BracketPrecedenceException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BracketPrecedenceException extends SyntaxErrorException
{
    /**
     * BracketPrecedenceException constructor.
     *
     * @param LexerModuleInterface $module
     * @param string               $string
     * @param int                  $position
     * @param string               $expectedPrecedence
     */
    public function __construct(LexerModuleInterface $module, $string, $position, $expectedPrecedence)
    {
        parent::__construct(
            $module,
            $string,
            $position,
            sprintf(
                'Open bracket %s is expected before closing one %s',
                $expectedPrecedence,
                $string[$position]
            ),
            0,
            null
        );
    }
}