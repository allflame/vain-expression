<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/16/16
 * Time: 10:01 AM
 */
namespace Vain\Expression\Conditional\IfX;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class IfExpression implements NonTerminalExpressionInterface
{
    private $condition;

    private $then;

    private $else;

    /**
     * IfExpression constructor.
     *
     * @param BooleanExpressionInterface $condition
     * @param ExpressionInterface        $then
     * @param ExpressionInterface        $else
     */
    public function __construct(
        BooleanExpressionInterface $condition,
        ExpressionInterface $then,
        ExpressionInterface $else
    ) {
        $this->condition = $condition;
        $this->then = $then;
        $this->else = $else;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        if ($this->condition->interpret($context)) {
            return $this->then->interpret($context);
        }

        return $this->else->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('if (%s) then (%s) else (%s)', $this->condition, $this->then, $this->else);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'if' => [
                'condition' => $this->condition->toArray(),
                'then' => $this->then->toArray(),
                'else' => $this->else->toArray()
            ]
        ];
    }
}