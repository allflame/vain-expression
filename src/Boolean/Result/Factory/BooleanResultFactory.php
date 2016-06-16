<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:22 AM
 */

namespace Vain\Expression\Boolean\Result\Factory;

use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\Result\BooleanResult;
use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;

class BooleanResultFactory implements BooleanResultFactoryInterface
{

    /**
     * @inheritDoc
     */
    public function false(FalseExpression $expression)
    {
        return new BooleanResult($expression, false, new FalseExpression($this));
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $expression)
    {
        return new BooleanResult($expression, true, new TrueExpression($this));
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $expression, BooleanResultInterface $result)
    {
        return new BooleanResult($expression, $result->getStatus(), $result);
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $expression, BooleanResultInterface $result)
    {
        $result = $result->invert();
        return new BooleanResult($expression, $result->getStatus(), $result);
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