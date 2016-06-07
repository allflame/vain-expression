<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/7/16
 * Time: 1:07 PM
 */

namespace Vain\Expression\Parser\Human;

use Vain\Expression\Binary\BinaryExpressionInterface;
use Vain\Expression\Comparison\ComparisonExpressionInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\UnaryExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class HumanParser implements VisitorInterface
{
    /**
     * @inheritDoc
     */
    public function eq(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s = %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function neq(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s != %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function gt(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s > %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function gte(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s >= %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function lt(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s < %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function lte(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s <= %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function in(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s in %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function like(ComparisonExpressionInterface $comparisonExpression)
    {
        return sprintf('%s like %s', $comparisonExpression->getWhat(), $comparisonExpression->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function true(ExpressionInterface $expression)
    {
        return 'true';
    }

    /**
     * @inheritDoc
     */
    public function false(ExpressionInterface $expression)
    {
        return 'false';
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
        return sprintf('!%s', $unaryExpression->getExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function andX(BinaryExpressionInterface $binaryExpression)
    {
        return sprintf('%s and %s', $binaryExpression->getFirstExpression(), $binaryExpression->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function orX(BinaryExpressionInterface $binaryExpression)
    {
        return sprintf('%s or %s', $binaryExpression->getFirstExpression(), $binaryExpression->getSecondExpression());
    }
}