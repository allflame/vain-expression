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
namespace Vain\Expression\Lexer\Token;

/**
 * Class AbstractToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractToken implements TokenInterface
{
    private $value;

    private $cursor;

    private $length;

    /**
     * AbstractToken constructor.
     *
     * @param mixed $value
     * @param int   $cursor
     * @param int   $length
     */
    public function __construct($value, $cursor, $length)
    {
        $this->value = $value;
        $this->cursor = $cursor;
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }
}