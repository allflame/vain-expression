<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:22 AM
 */

namespace Vain\Expression\Boolean\Result\Factory;

use Vain\Comparator\Result\ComparatorResultInterface;
use Vain\Core\Result\Factory\ResultFactoryInterface;
use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\Result\BooleanResult;
use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\ComparisonExpressionInterface;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;

class BooleanResultFactory implements BooleanResultFactoryInterface
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
        return new BooleanResult($expression, $this->resultFactory->failed());
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $expression)
    {
        return new BooleanResult($expression, $this->resultFactory->successful());
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $expression, BooleanResultInterface $result)
    {
        return new BooleanResult($expression, $result);
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $expression, BooleanResultInterface $result)
    {
        return new BooleanResult($expression, $result);
    }

    /**
     * @inheritDoc
     */
    public function comparison(ComparisonExpressionInterface $expression, ComparatorResultInterface $comparatorResult)
    {
        return new BooleanResult($expression, $comparatorResult);
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $expression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult)
    {
        return new BooleanResult($expression, $firstResult->getStatus() && $secondResult->getStatus(), new AndExpression($firstResult, $secondResult, $this));
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $expression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult)
    {
        return new BooleanResult($expression, $firstResult->getStatus() || $secondResult->getStatus(), new OrExpression($firstResult, $secondResult, $this));
    }
}