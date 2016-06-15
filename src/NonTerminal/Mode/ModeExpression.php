<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 10:16 AM
 */

namespace Vain\Expression\NonTerminal\Mode;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class ModeExpression implements NonTerminalExpressionInterface
{
    private $expression;

    private $mode;

    /**
     * ModeDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $mode
     */
    public function __construct(ExpressionInterface $expression, ExpressionInterface $mode)
    {
        $this->expression = $expression;
        $this->mode = $mode;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @return ExpressionInterface
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        // TODO: Implement interpret() method.
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $value = $this->expression->__toString();
        switch ($this->getMode()) {
            case 'string':
                return sprintf('"%s"', $value);
                break;
            case 'float':
            case 'double':
                return (float)$value;
                break;
            case 'bool':
            case 'boolean':
                return ($value) ? 'true' : 'false';
                break;
            case 'time':
                return $value->format(DATE_W3C);
                break;
            default:
                return (string)$value;
        }
    }
}