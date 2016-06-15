<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 10:57 AM
 */

namespace Vain\Expression\NonTerminal\Filter;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class FilterExpression implements NonTerminalExpressionInterface
{

    private $expression;

    private $filterExpression;

    /**
     * FilterDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $filterExpression
     */
    public function __construct(ExpressionInterface $expression, ExpressionInterface $filterExpression)
    {
        $this->expression = $expression;
        $this->filterExpression = $filterExpression;
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
    public function getFilterExpression()
    {
        return $this->filterExpression;
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
        return sprintf('%s where %s', $this->expression->__toString(), $this->filterExpression->__toString());
    }
}