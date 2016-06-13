<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 10:55 AM
 */

namespace Vain\Expression\Result\Factory;

use Vain\Core\Result\ResultInterface;
use Vain\Expression\Boolean\AndX\AndExpression;
use Vain\Expression\Boolean\False\FalseExpression;
use Vain\Expression\Boolean\Identity\IdentityExpression;
use Vain\Expression\Boolean\Not\NotExpression;
use Vain\Expression\Boolean\OrX\OrExpression;
use Vain\Expression\Boolean\True\TrueExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Result\ExpressionResultInterface;

interface ExpressionResultFactoryInterface
{
    /**
     * @param FalseExpression $expression
     *
     * @return ExpressionResultInterface
     */
    public function false(FalseExpression $expression);

    /**
     * @param TrueExpression $expression
     *
     * @return ExpressionResultInterface
     */
    public function true(TrueExpression $expression);

    /**
     * @param IdentityExpression $expression
     * @param ResultInterface $result
     *
     * @return ExpressionResultInterface
     */
    public function id(IdentityExpression $expression, ResultInterface $result);

    /**
     * @param NotExpression $expression
     * @param ResultInterface $result
     *
     * @return ExpressionResultInterface
     */
    public function not(NotExpression $expression, ResultInterface $result);

    /**
     * @param ExpressionInterface $expression
     * @param ResultInterface $result
     *
     * @return ExpressionResultInterface
     */
    public function comparison(ExpressionInterface $expression, ResultInterface $result);

    /**
     * @param AndExpression $binaryExpression
     * @param ExpressionResultInterface $firstResult
     * @param ExpressionResultInterface $secondResult
     *
     * @return ExpressionResultInterface
     */
    public function andX(AndExpression $binaryExpression, ExpressionResultInterface $firstResult, ExpressionResultInterface $secondResult);

    /**
     * @param OrExpression $binaryExpression
     * @param ExpressionResultInterface $firstResult
     * @param ExpressionResultInterface $secondResult
     *
     * @return ExpressionResultInterface
     */
    public function orX(OrExpression $binaryExpression, ExpressionResultInterface $firstResult, ExpressionResultInterface $secondResult);
}