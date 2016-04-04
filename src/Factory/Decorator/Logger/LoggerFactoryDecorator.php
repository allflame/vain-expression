<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:53 AM
 */

namespace Vain\Expression\Factory\Decorator\Logger;

use Vain\Expression\Decorator\Logger\LoggerExpressionDecorator;
use Vain\Expression\Factory\Debug\AbstractFactoryDecorator;
use Vain\Expression\Factory\FactoryInterface;
use Vain\Expression\Logger\LoggerInterface;
use Vain\Expression\ExpressionInterface;

class LoggerFactoryDecorator extends AbstractFactoryDecorator
{
    private $logger;

    /**
     * VainExpressionFactoryLoggerDecorator constructor.
     * @param LoggerInterface $logger
     * @param FactoryInterface $expressionFactory
     */
    public function __construct(LoggerInterface $logger, FactoryInterface $expressionFactory)
    {
        $this->logger = $logger;
        parent::__construct($expressionFactory);
    }

    /**
     * @inheritDoc
     */
    public function eq($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::eq($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function neq($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::neq($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function gt($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::gt($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function gte($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::gte($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function lt($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::lt($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function lte($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::lte($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function in($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::in($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function like($what, $against, $type = null)
    {
        return new LoggerExpressionDecorator($this->logger, parent::like($what, $against, $type));
    }

    /**
     * @inheritDoc
     */
    public function id(ExpressionInterface $expression)
    {
        return new LoggerExpressionDecorator($this->logger, parent::id($expression));
    }

    /**
     * @inheritDoc
     */
    public function not(ExpressionInterface $expression)
    {
        return new LoggerExpressionDecorator($this->logger, parent::not($expression));
    }

    /**
     * @inheritDoc
     */
    public function andX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return new LoggerExpressionDecorator($this->logger, parent::andX($firstExpression, $secondExpression));
    }

    /**
     * @inheritDoc
     */
    public function orX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return new LoggerExpressionDecorator($this->logger, parent::orX($firstExpression, $secondExpression));
    }
}