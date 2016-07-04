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

use Vain\Expression\Lexer\Token\TokenInterface;
use Vain\Expression\Parser\Module\Process\ParserProcessModuleInterface;

/**
 * Class UnsupportedTokenException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedTokenException extends ProcessModuleException
{
    /**
     * UnsupportedTokenException constructor.
     *
     * @param ParserProcessModuleInterface $process
     * @param TokenInterface               $token
     */
    public function __construct(ParserProcessModuleInterface $process, TokenInterface $token)
    {
        parent::__construct($process, sprintf('Unsupported token %s (%s)', $token->getValue(), get_class($token)), 0, null);
    }
}