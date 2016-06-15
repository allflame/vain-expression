<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\NonTerminal\Property;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class PropertyExpression implements NonTerminalExpressionInterface
{

    private $expression;

    private $property;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $property
     */
    public function __construct(ExpressionInterface $expression, $property)
    {
        $this->expression = $expression;
        $this->property = $property;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
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
        return sprintf('%s.%s', $this->expression->__toString(), $this->property);
    }
}