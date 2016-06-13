<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:22 AM
 */

namespace Vain\Expression\Result\Factory;

use Vain\Core\Result\Factory\ResultFactoryInterface;
use Vain\Core\Result\ResultInterface;
use Vain\Expression\Boolean\AndX\AndExpression;
use Vain\Expression\Boolean\False\FalseExpression;
use Vain\Expression\Boolean\Identity\IdentityExpression;
use Vain\Expression\Boolean\Not\NotExpression;
use Vain\Expression\Boolean\OrX\OrExpression;
use Vain\Expression\Boolean\True\TrueExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Result\ExpressionResult;
use Vain\Expression\Result\ExpressionResultInterface;

class ExpressionResultFactory implements ExpressionResultFactoryInterface
{

    private $resultFactory;

    /**
     * ExpressionResultFactory constructor.
     * @param ResultFactoryInterface $resultFactory
     */
    public function __construct(ResultFactoryInterface $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * @inheritDoc
     */
    public function false(FalseExpression $expression)
    {
        return new ExpressionResult($expression, $this->resultFactory->failed());
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $expression)
    {
        return new ExpressionResult($expression, $this->resultFactory->successful());
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $expression, ResultInterface $result)
    {
        return new ExpressionResult($expression, $result);
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $expression, ResultInterface $result)
    {
        return new ExpressionResult($expression, $result);
    }

    /**
     * @inheritDoc
     */
    public function comparison(ExpressionInterface $expression, ResultInterface $result)
    {
        return new ExpressionResult($expression, $result);
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $expression, ExpressionResultInterface $firstResult, ExpressionResultInterface $secondResult)
    {
        return new ExpressionResult($expression, new ExpressionResult(new AndExpression($firstResult, $secondResult), $this->resultFactory->createResult($firstResult->getStatus() && $secondResult->getStatus())));
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $expression, ExpressionResultInterface $firstResult, ExpressionResultInterface $secondResult)
    {
        return new ExpressionResult($expression, new ExpressionResult(new AndExpression($firstResult, $secondResult), $this->resultFactory->createResult($firstResult->getStatus() || $secondResult->getStatus())));
    }
}