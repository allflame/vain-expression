<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:46 AM
 */

namespace Vain\Expression\Factory\Debug;


use Vain\Expression\Factory\FactoryInterface;
use Vain\Expression\ExpressionInterface;

abstract class AbstractFactoryDecorator implements FactoryInterface
{
    private $expressionFactory;

    /**
     * AbstractVainExpressionFactoryDecorator constructor.
     * @param FactoryInterface $expressionFactory
     */
    public function __construct(FactoryInterface $expressionFactory)
    {
        $this->expressionFactory = $expressionFactory;
    }

    /**
     * @inheritDoc
     */
    public function eq($what, $against, $type = null)
    {
        return $this->expressionFactory->eq($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function neq($what, $against, $type = null)
    {
        return $this->expressionFactory->neq($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function gt($what, $against, $type = null)
    {
        return $this->expressionFactory->gt($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function gte($what, $against, $type = null)
    {
        return $this->expressionFactory->gte($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function lt($what, $against, $type = null)
    {
        return $this->expressionFactory->lt($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function lte($what, $against, $type = null)
    {
        return $this->expressionFactory->lte($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function in($what, $against, $type = null)
    {
        return $this->expressionFactory->in($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function like($what, $against, $type = null)
    {
        return $this->expressionFactory->like($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function id(ExpressionInterface $expression)
    {
        return $this->expressionFactory->id($expression);
    }

    /**
     * @inheritDoc
     */
    public function not(ExpressionInterface $expression)
    {
        return $this->expressionFactory->not($expression);
    }

    /**
     * @inheritDoc
     */
    public function false(ExpressionInterface $expression)
    {
        return $this->expressionFactory->false($expression);
    }

    /**
     * @inheritDoc
     */
    public function true(ExpressionInterface $expression)
    {
        return $this->expressionFactory->true($expression);
    }

    /**
     * @inheritDoc
     */
    public function andX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return $this->expressionFactory->andX($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function orX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return $this->expressionFactory->orX($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function create($shortcut)
    {
        return $this->expressionFactory->create($shortcut);
    }


}