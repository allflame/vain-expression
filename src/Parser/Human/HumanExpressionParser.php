<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 9:12 PM
 */

namespace Vain\Expression\Parser\Human;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\ParserInterface;

class HumanExpressionParser implements ParserInterface
{
    /**
     * @inheritDoc
     */
    public function eq(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s = %s', $what->parse($this), $against->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s != %s', $what->parse($this), $against->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s > %s', $what->parse($this), $against->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s >= %s', $what->parse($this), $against->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s < %s', $what->parse($this), $against->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s <= %s', $what->parse($this), $against->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function in(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s in %s', $what->parse($this), $against->parse($this));
    }

    /**
     * @inheritDoc
     */
    public function like(DescriptorInterface $what, DescriptorInterface $against)
    {
        return sprintf('%s like %s', $what->parse($this), $against->parse($this));
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
    public function false()
    {
        return 'FALSE';
    }

    /**
     * @inheritDoc
     */
    public function true()
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