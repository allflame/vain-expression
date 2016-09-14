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

namespace Vain\Expression\Exception;

use Vain\Expression\Lexer\Module\LexerModuleInterface;

/**
 * Class UnclosedBracketException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class WrongBracketException extends SyntaxErrorException
{
    /**
     * UnclosedBracketException constructor.
     *
     * @param LexerModuleInterface $module
     * @param string               $string
     * @param int                  $position
     * @param string               $previousBracket
     */
    public function __construct(LexerModuleInterface $module, string $string, int $position, string $previousBracket)
    {
        parent::__construct(
            $module,
            $string,
            $position,
            sprintf(
                'Bracket %s does not correspond last opened bracket %s',
                $string[$position],
                $previousBracket
            ),
            0,
            null
        );
    }
}