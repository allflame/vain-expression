<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/15/16
 * Time: 8:07 AM
 */
namespace Vain\Expression\Terminal;

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