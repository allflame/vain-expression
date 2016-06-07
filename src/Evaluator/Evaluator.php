<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:07 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Comparator\Repository\ComparatorRepositoryInterface;
use Vain\Comparator\Result\ComparableResult;
use Vain\Expression\Binary\BinaryExpressionInterface;
use Vain\Expression\Comparison\ComparisonExpressionInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\UnaryExpressionInterface;

class Evaluator implements EvaluatorInterface
{

    private $comparatorRepository;

    private $expression;

    private $context;

    /**
     * ExpressionEvaluator constructor.
     * @param ComparatorRepositoryInterface $comparatorRepository
     * @param ExpressionInterface $expression
     * @param \ArrayAccess $context
     */
    public function __construct(ComparatorRepositoryInterface $comparatorRepository, ExpressionInterface $expression = null, \ArrayAccess $context = null)
    {
        $this->comparatorRepository = $comparatorRepository;
        $this->expression = $expression;
        $this->context = $context;
    }

    /**
     * @inheritDoc
     */
    public function eq(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->eq($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function neq(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->neq($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function gt(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->gt($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function gte(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->gte($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function lt(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->lt($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function lte(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->lte($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function in(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->in($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function like(ComparisonExpressionInterface $comparisonExpression)
    {
        $whatValue = $comparisonExpression->getWhat()->getValue($this->context);
        $againstValue = $comparisonExpression->getAgainst()->getValue($this->context);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->like($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function id(UnaryExpressionInterface $unaryExpression)
    {
        return $unaryExpression->getExpression()->accept($this);
    }

    /**
     * @inheritDoc
     */
    public function not(UnaryExpressionInterface $unaryExpression)
    {
        return $unaryExpression->getExpression()->accept($this)->invert();
    }

    /**
     * @inheritDoc
     */
    public function andX(BinaryExpressionInterface $binaryExpression)
    {
        $firstResult = $binaryExpression->getFirstExpression()->accept($this);
        $secondResult = $binaryExpression->getFirstExpression()->accept($this);

        if (false === $firstResult->getStatus()) {
            return new ComparableResult(false);
        }

        if (false === $secondResult->getStatus()) {
            return new ComparableResult(false);
        }

        return new ComparableResult(true);
    }

    /**
     * @inheritDoc
     */
    public function orX(BinaryExpressionInterface $binaryExpression)
    {
        $firstResult = $binaryExpression->getFirstExpression()->accept($this);
        $secondResult = $binaryExpression->getFirstExpression()->accept($this);

        if (false === $firstResult->getStatus() && false === $secondResult->getStatus()) {
            return new ComparableResult(false);
        }

        return new ComparableResult(true);
    }

    /**
     * @inheritDoc
     */
    public function true(ExpressionInterface $expression)
    {
        return new ComparableResult(true);
    }

    /**
     * @inheritDoc
     */
    public function false(ExpressionInterface $expression)
    {
        return new ComparableResult(false);
    }

    /**
     * @inheritDoc
     */
    public function withExpression(ExpressionInterface $expression)
    {
        $clone = clone $this;
        $clone->expression = $expression;

        return $clone;
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