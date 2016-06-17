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

use Vain\Expression\Compiler\Lexer\LexerInterface;

/**
 * Class SyntaxErrorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SyntaxErrorException extends LexerException
{
    /**
     * SyntaxErrorException constructor.
     *
     * @param LexerInterface $lexer
     * @param string         $expression
     * @param int            $position
     * @param string         $message
     */
    public function __construct(LexerInterface $lexer, $expression, $position, $message)
    {
        parent::__construct($lexer, sprintf('Syntax error near %d in %s: %s', $position, $expression, $message), 0, null);
    }
}