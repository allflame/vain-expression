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
namespace Vain\Expression\Compiler\Token;

/**
 * Class AbstractToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractToken implements TokenInterface
{
    private $value;

    private $cursor;

    /**
     * AbstractToken constructor.
     *
     * @param mixed $value
     * @param int   $cursor
     */
    public function __construct($value, $cursor)
    {
        $this->value = $value;
        $this->cursor = $cursor;
    }

    /**
     * @param string $type
     * @param null   $value
     *
     * @return boolean
     */
    abstract public function doTest($type, $value = null);

    /**
     * @inheritDoc
     */
    public function test($type, $value = null)
    {
        if (false === (null === $this->value || $value === $this->value)) {
            return false;
        }

        return $this->doTest($type, $value);
    }
}