<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:47 AM
 */
namespace Vain\Expression\Factory;

use Vain\Expression\Binary\AndX\AndExpression;
use Vain\Expression\Binary\OrX\OrExpression;
use Vain\Expression\Comparison\Equal\EqualExpression;
use Vain\Expression\Comparison\Greater\GreaterExpression;
use Vain\Expression\Comparison\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Comparison\In\InExpression;
use Vain\Expression\Comparison\Less\LessExpression;
use Vain\Expression\Comparison\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Comparison\Like\LikeExpression;
use Vain\Expression\Comparison\NotEqual\NotEqualExpression;
use Vain\Expression\Unary\False\FalseExpression;
use Vain\Expression\Unary\Identity\IdentityExpression;
use Vain\Expression\Unary\Not\NotExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\True\TrueExpression;

interface ExpressionFactoryInterface
{
    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return EqualExpression
     */
    public function eq($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return NotEqualExpression
     */
    public function neq($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return GreaterExpression
     */
    public function gt($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return GreaterOrEqualExpression
     */
    public function gte($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return LessExpression
     */
    public function lt($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return LessOrEqualExpression
     */
    public function lte($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return InExpression
     */
    public function in($what, $against, $type = null);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return LikeExpression
     */
    public function like($what, $against, $type = null);

    /**
     * @param ExpressionInterface $expression
     *
     * @return IdentityExpression
     */
    public function id(ExpressionInterface $expression);

    /**
     * @param ExpressionInterface $expression
     *
     * @return NotExpression
     */
    public function not(ExpressionInterface $expression);

    /**
     * @param ExpressionInterface $expression
     *
     * @return FalseExpression
     */
    public function false(ExpressionInterface $expression);

    /**
     * @param ExpressionInterface $expression
     * 
     * @return TrueExpression
     */
    public function true(ExpressionInterface $expression);

    /**
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     *
     * @return AndExpression
     */
    public function andX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression);

    /**
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     *
     * @return OrExpression
     */
    public function orX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression);

    /**
     * @param string $shortcut
     *
     * @return ExpressionInterface
     */
    public function create($shortcut);
}