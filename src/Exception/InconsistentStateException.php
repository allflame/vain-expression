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

use Vain\Expression\Lexer\LexerInterface;
use Vain\Expression\Lexer\Module\LexerModuleInterface;

/**
 * Class InconsistentStateException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class InconsistentStateException extends LexerException
{
    /**
     * InconsistentStateException constructor.
     *
     * @param LexerInterface       $lexer
     * @param LexerModuleInterface $module
     */
    public function __construct(LexerInterface $lexer, LexerModuleInterface $module)
    {
        parent::__construct($lexer, sprintf('Module %s reported inconsistent state', get_class($module)), 0, null);
    }
}