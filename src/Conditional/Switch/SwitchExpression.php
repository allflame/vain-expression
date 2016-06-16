<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/16/16
 * Time: 10:07 AM
 */

namespace Vain\Expression\Conditional\SwitchX;


use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class SwitchExpression implements NonTerminalExpressionInterface
{
    private $check;

    private $map;

    private $default;

    /**
     * SwitchExpression constructor.
     * @param ExpressionInterface $check
     * @param ExpressionInterface[] $map
     * @param ExpressionInterface $default
     */
    public function __construct(ExpressionInterface $check, array $map, ExpressionInterface $default)
    {
        $this->check = $check;
        $this->map = $map;
        $this->default = $default;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $switch = $this->check->interpret($context);
        if (false === array_key_exists($switch, $this->map)) {
            return $this->default->interpret($context);
        }

        return $this->map[$switch]->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('switch (%s) {%s default: %s}', implode(', ', array_map(function ($key, $value) { return sprintf('%s: %s', $key, $value);}, $this->map)), $this->default);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $mapped = [];
        foreach ($this->map as $key => $expression) {
            $mapped[$key] = $expression->toArray();
        }

        return ['switch' => ['check' => $this->check->toArray(), 'map' => $mapped, 'default' => $this->default->toArray()]];
    }
}