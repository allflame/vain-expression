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
 * Class SyntaxErrorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SyntaxErrorException extends LexerModuleException
{
    private $string;

    private $position;

    /**
     * SyntaxErrorException constructor.
     *
     * @param LexerModuleInterface $module
     * @param string               $string
     * @param int                  $position
     * @param string               $message
     * @param int                  $code
     * @param \Exception|null      $previous
     */
    public function __construct(
        LexerModuleInterface $module,
        string $string,
        int $position,
        string $message,
        int $code,
        \Exception $previous = null
    )
    {
        $this->string = $string;
        $this->position = $position;
        parent::__construct($module, sprintf('Syntax error on position %d of string %s: %s', $position, $string, $message), $code, $previous);
    }

    /**
     * @return string
     */
    public function getString() : string
    {
        return $this->string;
    }

    /**
     * @return int
     */
    public function getPosition() : int
    {
        return $this->position;
    }
}