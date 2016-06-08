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
use Vain\Expression\Binary\Equal\EqualExpression;
use Vain\Expression\Binary\Greater\GreaterExpression;
use Vain\Expression\Binary\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Binary\In\InExpression;
use Vain\Expression\Binary\Less\LessExpression;
use Vain\Expression\Binary\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Binary\Like\LikeExpression;
use Vain\Expression\Binary\NotEqual\NotEqualExpression;
use Vain\Expression\False\FalseExpression;
use Vain\Expression\Unary\Identity\IdentityExpression;
use Vain\Expression\Unary\Not\NotExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\True\TrueExpression;

interface ExpressionFactoryInterface
{
    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return EqualExpression
     */
    public function eq(ExpressionInterface $what = null, ExpressionInterface $against = null);

    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return NotEqualExpression
     */
    public function neq(ExpressionInterface $what = null, ExpressionInterface $against = null);

    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return GreaterExpression
     */
    public function gt(ExpressionInterface $what = null, ExpressionInterface $against = null);

    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return GreaterOrEqualExpression
     */
    public function gte(ExpressionInterface $what = null, ExpressionInterface $against = null);

    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return LessExpression
     */
    public function lt(ExpressionInterface $what = null, ExpressionInterface $against = null);

    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return LessOrEqualExpression
     */
    public function lte(ExpressionInterface $what = null, ExpressionInterface $against = null);

    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return InExpression
     */
    public function in(ExpressionInterface $what = null, ExpressionInterface $against = null);

    /**
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     *
     * @return LikeExpression
     */
    public function like(ExpressionInterface $what = null, ExpressionInterface $against = null);

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
     * @return FalseExpression
     */
    public function false();

    /**
     * @return TrueExpression
     */
    public function true();

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
     * @param mixed $value
     *
     * @return DescriptorInterface
     */
    public function inplace($value = null);

    /**
     * @param string $module
     *
     * @return DescriptorInterface
     */
    public function module($module);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $method
     * @param array $arguments
     *
     * @return DescriptorInterface
     */
    public function method(DescriptorInterface $descriptor, $method, array $arguments = []);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $property
     *
     * @return DescriptorInterface
     */
    public function property(DescriptorInterface $descriptor, $property);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $functionName
     * @param array $arguments
     *
     * @return DescriptorInterface
     */
    public function func(DescriptorInterface $descriptor, $functionName, array $arguments = []);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $mode
     *
     * @return DescriptorInterface
     */
    public function mode(DescriptorInterface $descriptor, $mode);

    /**
     * @param DescriptorInterface $descriptor
     * @param ExpressionInterface $expression
     *
     * @return DescriptorInterface
     */
    public function filter(DescriptorInterface $descriptor, ExpressionInterface $expression);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $class
     * @param string $method
     * @param array $arguments
     *
     * @return DescriptorInterface
     */
    public function helper(DescriptorInterface $descriptor, $class, $method, array $arguments = []);
    
    /**
     * @param string $shortcut
     *
     * @return ExpressionInterface
     */
    public function create($shortcut);
}