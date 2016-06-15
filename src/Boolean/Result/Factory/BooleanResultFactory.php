<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:22 AM
 */

namespace Vain\Expression\Boolean\Result\Factory;

use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\BinaryExpressionInterface;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\Result\BooleanResult;
use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\Boolean\Unary\UnaryExpressionInterface;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;
use Vain\Expression\Boolean\ZeroAry\ZeroAryExpressionInterface;

class BooleanResultFactory implements BooleanResultFactoryInterface
{

    /**
     * @inheritDoc
     */
    public function false(ZeroAryExpressionInterface $expression)
    {
        return new BooleanResult($expression, false, new FalseExpression($this));
    }

    /**
     * @inheritDoc
     */
    public function true(ZeroAryExpressionInterface $expression)
    {
        return new BooleanResult($expression, true, new TrueExpression($this));
    }

    /**
     * @inheritDoc
     */
    public function id(UnaryExpressionInterface $expression, BooleanResultInterface $result)
    {
        return new BooleanResult($expression, $result->getStatus(), $result);
    }

    /**
     * @inheritDoc
     */
    public function not(UnaryExpressionInterface $expression, BooleanResultInterface $result)
    {
        $result = $result->invert();
        return new BooleanResult($expression, $result->getStatus(), $result);
    }

    /**
     * @inheritDoc
     */
    public function andX(BinaryExpressionInterface $expression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult)
    {
        return new BooleanResult($expression, $firstResult->getStatus() && $secondResult->getStatus(), new AndExpression($firstResult, $secondResult, $this));
    }

    /**
     * @inheritDoc
     */
    public function orX(BinaryExpressionInterface $expression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult)
    {
        return new BooleanResult($expression, $firstResult->getStatus() || $secondResult->getStatus(), new OrExpression($firstResult, $secondResult, $this));
    }
}