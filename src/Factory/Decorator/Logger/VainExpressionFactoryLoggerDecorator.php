<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:53 AM
 */

namespace Vain\Expression\Factory\Decorator\Logger;

use Vain\Expression\Decorator\Logger\VainExpressionLoggerDecorator;
use Vain\Expression\Factory\Debug\AbstractVainExpressionFactoryDecorator;
use Vain\Expression\Factory\VainExpressionFactoryInterface;
use Vain\Expression\Logger\VainExpressionLoggerInterface;
use Vain\Expression\VainExpressionInterface;

class VainExpressionFactoryLoggerDecorator extends AbstractVainExpressionFactoryDecorator
{
    private $logger;

    /**
     * VainExpressionFactoryLoggerDecorator constructor.
     * @param VainExpressionLoggerInterface $logger
     * @param VainExpressionFactoryInterface $expressionFactory
     */
    public function __construct(VainExpressionLoggerInterface $logger, VainExpressionFactoryInterface $expressionFactory)
    {
        $this->logger = $logger;
        parent::__construct($expressionFactory);
    }

    /**
     * @inheritDoc
     */
    public function eq($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::eq($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function neq($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::neq($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function gt($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::gt($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function gte($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::gte($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function lt($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::lt($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function lte($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::lte($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function in($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::in($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function like($what, $against, $type = null)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::like($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function id(VainExpressionInterface $expression)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::id($expression));
    }

    /**
     * @inheritDoc
     */
    public function not(VainExpressionInterface $expression)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::not($expression));
    }

    /**
     * @inheritDoc
     */
    public function andX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::andX($firstExpression, $secondExpression));
    }

    /**
     * @inheritDoc
     */
    public function orX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        return new VainExpressionLoggerDecorator($this->logger, parent::orX($firstExpression, $secondExpression));
    }
}