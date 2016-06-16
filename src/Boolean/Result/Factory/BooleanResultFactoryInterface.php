<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 10:55 AM
 */

namespace Vain\Expression\Boolean\Result\Factory;

use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;

interface BooleanResultFactoryInterface
{
    /**
     * @param FalseExpression $expression
     *
     * @return BooleanResultInterface
     */
    public function false(FalseExpression $expression);

    /**
     * @param TrueExpression $expression
     *
     * @return BooleanResultInterface
     */
    public function true(TrueExpression $expression);

    /**
     * @param IdentityExpression $expression
     * @param BooleanResultInterface $result
     *
     * @return BooleanResultInterface
     */
    public function id(IdentityExpression $expression, BooleanResultInterface $result);

    /**
     * @param NotExpression $expression
     * @param BooleanResultInterface $result
     *
     * @return BooleanResultInterface
     */
    public function not(NotExpression $expression, BooleanResultInterface $result);

    /**
     * @param AndExpression $binaryExpression
     * @param BooleanResultInterface $firstResult
     * @param BooleanResultInterface $secondResult
     *
     * @return BooleanResultInterface
     */
    public function andX(AndExpression $binaryExpression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult);

    /**
     * @param OrExpression $binaryExpression
     * @param BooleanResultInterface $firstResult
     * @param BooleanResultInterface $secondResult
     *
     * @return BooleanResultInterface
     */
    public function orX(OrExpression $binaryExpression, BooleanResultInterface $firstResult, BooleanResultInterface $secondResult);
}