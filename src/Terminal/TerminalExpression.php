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
namespace Vain\Expression\Terminal;

/**
 * Class TerminalExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TerminalExpression implements TerminalExpressionInterface
{
    private $value;

    /**
     * TerminalExpression constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['terminal' => ['value' => json_encode($this->value)]];
    }
}