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

use Vain\Expression\Parser\Module\Process\ParserProcessModuleInterface;
use Vain\Expression\Lexer\Token\TokenInterface;

/**
 * Class SyntaxException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SyntaxException extends ProcessModuleException
{
    /**
     * SyntaxException constructor.
     *
     * @param ParserProcessModuleInterface $process
     * @param TokenInterface               $token
     * @param int                          $message
     */
    public function __construct(
        ParserProcessModuleInterface $process,
        TokenInterface $token,
        $message
    ) {
        parent::__construct($process, sprintf('Syntax error near %s: %s', $token->getValue(), $message), 0, null);
    }
}