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
 * Class UnclosedBracketException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnclosedBracketException extends LexerModuleException
{
    /**
     * InconsistentBracketException constructor.
     *
     * @param LexerModuleInterface $module
     * @param array                $brackets
     */
    public function __construct(LexerModuleInterface $module, array $brackets)
    {

        parent::__construct($module, sprintf('There are still unclosed brackets %s', implode(', ', $brackets)), 0, null);
    }
}