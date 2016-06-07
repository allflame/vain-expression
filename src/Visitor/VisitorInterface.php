<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/6/16
 * Time: 12:29 PM
 */

namespace Vain\Expression\Visitor;

use Vain\Comparator\Result\ComparableResultInterface;
use Vain\Expression\Binary\BinaryExpressionInterface;
use Vain\Expression\Comparison\ComparisonExpressionInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\UnaryExpressionInterface;

interface VisitorInterface
{
    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function eq(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function neq(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function gt(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function gte(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function lt(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function lte(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function in(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ComparisonExpressionInterface $comparisonExpression
     *
     * @return ComparableResultInterface
     */
    public function like(ComparisonExpressionInterface $comparisonExpression);

    /**
     * @param ExpressionInterface $expression
     *
     * @return ComparableResultInterface
     */
    public function true(ExpressionInterface $expression);

    /**
     * @param ExpressionInterface $expression
     *
     * @return ComparableResultInterface
     */
    public function false(ExpressionInterface $expression);

    /**
     * @param UnaryExpressionInterface $unaryExpression
     *
     * @return ComparableResultInterface
     */
    public function id(UnaryExpressionInterface $unaryExpression);

    /**
     * @param UnaryExpressionInterface $unaryExpression
     *
     * @return ComparableResultInterface
     */
    public function not(UnaryExpressionInterface $unaryExpression);

    /**
     * @param BinaryExpressionInterface $binaryExpression
     *
     * @return ComparableResultInterface
     */
    public function andX(BinaryExpressionInterface $binaryExpression);

    /**
     * @param BinaryExpressionInterface $binaryExpression
     *
     * @return ComparableResultInterface
     */
    public function orX(BinaryExpressionInterface $binaryExpression);
}