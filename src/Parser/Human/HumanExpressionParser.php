<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 9:12 PM
 */

namespace Parser\Human;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\ExpressionParserInterface;

class HumanExpressionParser implements ExpressionParserInterface
{
    /**
     * @inheritDoc
     */
    public function eq($what, $against)
    {
        return sprintf('%s = %s', $what, $against);
    }

    /**
     * @inheritDoc
     */
    public function neq($what, $against)
    {
        return sprintf('%s != %s', $what, $against);
    }

    /**
     * @inheritDoc
     */
    public function gt($what, $against)
    {
        return sprintf('%s > %s', $what, $against);
    }

    /**
     * @inheritDoc
     */
    public function gte($what, $against)
    {
        return sprintf('%s >= %s', $what, $against);
    }

    /**
     * @inheritDoc
     */
    public function lt($what, $against)
    {
        return sprintf('%s < %s', $what, $against);
    }

    /**
     * @inheritDoc
     */
    public function lte($what, $against)
    {
        return sprintf('%s <= %s', $what, $against);
    }

    /**
     * @inheritDoc
     */
    public function in($what, $against)
    {
        return sprintf('%s in (%s)', $what, implode(', ', $against));
    }

    /**
     * @inheritDoc
     */
    public function like($what, $against)
    {
        return sprintf('%s like %s', $what, $against);
    }

    /**
     * @inheritDoc
     */
    public function id(ExpressionInterface $expression)
    {
        return sprintf('(%s)', $expression->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function not(ExpressionInterface $expression)
    {
        return sprintf('!(%s)', $expression->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function false(ExpressionInterface $expression)
    {
        return 'FALSE';
    }

    /**
     * @inheritDoc
     */
    public function true(ExpressionInterface $expression)
    {
        return 'TRUE';
    }

    /**
     * @inheritDoc
     */
    public function andX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return sprintf('(%s AND %s)', $firstExpression->parse($this), $secondExpression->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function orX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return sprintf('(%s OR %s)', $firstExpression->parse($this), $secondExpression->parse($this));
    }
}