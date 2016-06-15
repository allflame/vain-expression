<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 10:55 AM
 */

namespace Vain\Expression\Boolean\Result\Factory;

use Vain\Expression\Boolean\Binary\BinaryExpressionInterface;
use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\Boolean\Unary\UnaryExpressionInterface;
use Vain\Expression\Boolean\ZeroAry\ZeroAryExpressionInterface;

interface BooleanResultFactoryInterface
{
    /**
     * @param ZeroAryExpressionInterface $expression
     *
     * @return BooleanResultInterface
     */
    public function false(ZeroAryExpressionInterface $expression);

    /**
     * @param ZeroAryExpressionInterface $expression
     *
     * @return BooleanResultInterface
     */
    public function true(ZeroAryExpressionInterface $expression);

    /**
     * @param UnaryExpressionInterface $expression
     * @param BooleanResultInterface $result
     *
     * @return BooleanResultInterface
     */
    public function id(UnaryExpressionInterface $expression, BooleanResultInterface $result);

    /**
     * @param UnaryExpressionInterface $expression
     * @param BooleanResultInterface $result
     *
     * @return BooleanResultInterface
     */
    public function not(UnaryExpressionInterface $expression, BooleanResultInterface $result);

    /**
     * @param BinaryExpressionInterface $binaryExpression
     * @param BooleanResultInterface $firstResult
     * @param BooleanResultInterface $secondResult
     *
     * @return BooleanResultInterface
     */
    public function andX(BinaryExpressionInterface $binaryExpression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult);

    /**
     * @param BinaryExpressionInterface $binaryExpression
     * @param BooleanResultInterface $firstResult
     * @param BooleanResultInterface $secondResult
     *
     * @return BooleanResultInterface
     */
    public function orX(BinaryExpressionInterface $binaryExpression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult);
}