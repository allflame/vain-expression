<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:47 AM
 */
namespace Vain\Expression\Factory;

use Vain\Expression\Binary\AndX\VainBinaryAndExpression;
use Vain\Expression\Binary\OrX\VainBinaryOrExpression;
use Vain\Expression\Comparison\Equal\VainComparisonEqualExpression;
use Vain\Expression\Comparison\Greater\VainComparisonGreaterExpression;
use Vain\Expression\Comparison\GreaterOrEqual\VainComparisonGreaterOrEqualExpression;
use Vain\Expression\Comparison\In\VainComparisonInExpression;
use Vain\Expression\Comparison\Less\VainComparisonLessExpression;
use Vain\Expression\Comparison\LessOrEqual\VainComparisonLessOrEqualExpression;
use Vain\Expression\Comparison\Like\VainComparisonLikeExpression;
use Vain\Expression\Comparison\NotEqual\VainComparisonNotEqualExpression;
use Vain\Expression\Unary\Identity\VainUnaryIdentityExpression;
use Vain\Expression\Unary\Not\VainUnaryNotExpression;
use Vain\Expression\VainExpressionInterface;

interface VainExpressionFactoryInterface
{
    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonEqualExpression
     */
    public function eq($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonNotEqualExpression
     */
    public function neq($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonGreaterExpression
     */
    public function gt($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonGreaterOrEqualExpression
     */
    public function gte($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonLessExpression
     */
    public function lt($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonLessOrEqualExpression
     */
    public function lte($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonInExpression
     */
    public function in($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return VainComparisonLikeExpression
     */
    public function like($what, $against, $type = null);

    /**
     * @param VainExpressionInterface $expression
     *
     * @return VainUnaryIdentityExpression
     */
    public function id(VainExpressionInterface $expression);

    /**
     * @param VainExpressionInterface $expression
     *
     * @return VainUnaryNotExpression
     */
    public function not(VainExpressionInterface $expression);

    /**
     * @param VainExpressionInterface $firstExpression
     * @param VainExpressionInterface $secondExpression
     *
     * @return VainBinaryAndExpression
     */
    public function andX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression);

    /**
     * @param VainExpressionInterface $firstExpression
     * @param VainExpressionInterface $secondExpression
     *
     * @return VainBinaryOrExpression
     */
    public function orX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression);

    /**
     * @param string $shortcut
     *
     * @return VainExpressionInterface
     */
    public function create($shortcut);
}