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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Expression\Lexer\LexerInterface;

/**
 * Class LexerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LexerException extends AbstractCoreException
{
    private $lexer;

    /**
     * LexerException constructor.
     *
     * @param LexerInterface $lexer
     * @param string         $message
     * @param int            $code
     * @param \Exception     $previous
     */
    public function __construct(LexerInterface $lexer, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->lexer = $lexer;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return LexerInterface
     */
    public function getLexer() : LexerInterface
    {
        return $this->lexer;
    }
}
