<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:46 AM
 */

namespace Vain\Expression\Factory\Debug;


use Vain\Expression\Factory\VainExpressionFactoryInterface;
use Vain\Expression\VainExpressionInterface;

abstract class AbstractVainExpressionFactoryDecorator implements VainExpressionFactoryInterface
{
    private $expressionFactory;

    /**
     * AbstractVainExpressionFactoryDecorator constructor.
     * @param VainExpressionFactoryInterface $expressionFactory
     */
    public function __construct(VainExpressionFactoryInterface $expressionFactory)
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
    public function id(VainExpressionInterface $expression)
    {
        return $this->expressionFactory->id($expression);
    }

    /**
     * @inheritDoc
     */
    public function not(VainExpressionInterface $expression)
    {
        return $this->expressionFactory->not($expression);
    }

    /**
     * @inheritDoc
     */
    public function andX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        return $this->expressionFactory->andX($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function orX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        return $this->expressionFactory->orX($firstExpression, $secondExpression);
    }
}