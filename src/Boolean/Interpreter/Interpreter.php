<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:09 AM
 */

namespace Vain\Expression\Boolean\Interpreter;

use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Comparator\Repository\ComparatorRepositoryInterface;
use Vain\Expression\Boolean\ZeroAry\Comparison\Equal\EqualExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\Greater\GreaterExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\In\InExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\Less\LessExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\Like\LikeExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\NotEqual\NotEqualExpression;
use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;
use Vain\Expression\Rule\RuleInterface;

class Interpreter implements InterpreterInterface
{

    private $comparatorRepository;

    private $resultFactory;

    private $context;

    /**
     * ExpressionEvaluator constructor.
     * @param ComparatorRepositoryInterface $comparatorRepository
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(ComparatorRepositoryInterface $comparatorRepository, BooleanResultFactoryInterface $resultFactory)
    {
        $this->comparatorRepository = $comparatorRepository;
        $this->resultFactory = $resultFactory;
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $unaryExpression, \ArrayAccess $context = null)
    {
        return $this->resultFactory->id($unaryExpression, $unaryExpression->getExpression()->interpret($context));
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $unaryExpression, \ArrayAccess $context = null)
    {
        return $this->resultFactory->not($unaryExpression, $unaryExpression->getExpression()->interpret($context)->invert());
    }

    /**
     * @inheritDoc
     */
    public function eq(EqualExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->eq($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function neq(NotEqualExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->neq($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function gt(GreaterExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->gt($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function gte(GreaterOrEqualExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->gte($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function lt(LessExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->lt($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function lte(LessOrEqualExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->lte($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function in(InExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->in($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function like(LikeExpression $comparisonExpression, \ArrayAccess $context = null)
    {
        $whatValue = $comparisonExpression->getWhat()->interpret($context);
        $againstValue = $comparisonExpression->getAgainst()->interpret($context);

        return $this->resultFactory->comparison($comparisonExpression, $this->comparatorRepository->getComparator(gettype($whatValue))->like($whatValue, $againstValue));
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $binaryExpression, \ArrayAccess $context = null)
    {
        $firstResult = $binaryExpression->getFirstExpression()->interpret($this);
        $secondResult = $binaryExpression->getFirstExpression()->interpret($this);

        return $this->resultFactory->andX($binaryExpression, $firstResult, $secondResult);
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $binaryExpression, \ArrayAccess $context = null)
    {
        $firstResult = $binaryExpression->getFirstExpression()->interpret($this);
        $secondResult = $binaryExpression->getFirstExpression()->interpret($this);

        return $this->resultFactory->orX($binaryExpression, $firstResult, $secondResult);
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $expression, \ArrayAccess $context = null)
    {
        return $this->resultFactory->true($expression);
    }

    /**
     * @inheritDoc
     */
    public function false(FalseExpression $expression, \ArrayAccess $context = null)
    {
        return $this->resultFactory->false($expression);
    }

    /**
     * @inheritDoc
     */
    public function result(BooleanResultInterface $resultExpression)
    {
        return $resultExpression->getStatus();
    }

    /**
     * @inheritDoc
     */
    public function rule(RuleInterface $rule, \ArrayAccess $context = null)
    {
        return $rule->getExpression()->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function withContext(\ArrayAccess $context = null)
    {
        $clone = clone $this;
        $clone->context = $context;

        return $clone;
    }
}