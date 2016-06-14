<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:22 AM
 */

namespace Vain\Expression\Result\Factory;

use Vain\Comparator\Result\ComparatorResultInterface;
use Vain\Core\Result\Factory\ResultFactoryInterface;
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
        return new ExpressionResult(false, $expression);
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $expression)
    {
        return new ExpressionResult(true, $expression);
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $expression, ExpressionResultInterface $expressionResult)
    {
        return new ExpressionResult($expressionResult->getStatus(), $expressionResult);
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $expression, ExpressionResultInterface $result)
    {
        return new ExpressionResult($result->getStatus(), $result);
    }

    /**
     * @inheritDoc
     */
    public function comparison(ExpressionInterface $expression, ComparatorResultInterface $result)
    {
        return new ExpressionResult($result->getStatus(), $result);
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $expression, ExpressionResultInterface $firstResult, ExpressionResultInterface $secondResult)
    {
        return new ExpressionResult($firstResult->getStatus() && $secondResult->getStatus(), new AndExpression($firstResult, $secondResult));
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $expression, ExpressionResultInterface $firstResult, ExpressionResultInterface $secondResult)
    {
        return new ExpressionResult($firstResult->getStatus() || $secondResult->getStatus(), new OrExpression($firstResult, $secondResult));
    }
}