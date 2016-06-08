<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:47 AM
 */
namespace Vain\Expression\Factory;

use Vain\Data\Module\DataModuleInterface;
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
     * @return ExpressionInterface
     */
    public function inPlace($value = null);

    /**
     * @return ExpressionInterface
     */
    public function local();

    /**
     * @param DataModuleInterface $module
     *
     * @return ExpressionInterface
     */
    public function module(DataModuleInterface $module);

    /**
     * @param ExpressionInterface $expression
     * @param string $method
     * @param array $arguments
     *
     * @return ExpressionInterface
     */
    public function method(ExpressionInterface $expression, $method, array $arguments = []);

    /**
     * @param ExpressionInterface $expression
     * @param string $property
     *
     * @return ExpressionInterface
     */
    public function property(ExpressionInterface $expression, $property);

    /**
     * @param ExpressionInterface $expression
     * @param string $functionName
     * @param array $arguments
     *
     * @return ExpressionInterface
     */
    public function func(ExpressionInterface $expression, $functionName, array $arguments = []);

    /**
     * @param ExpressionInterface $expression
     * @param string $mode
     *
     * @return ExpressionInterface
     */
    public function mode(ExpressionInterface $expression, $mode);

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $filterExpression
     *
     * @return ExpressionInterface
     */
    public function filter(ExpressionInterface $expression, ExpressionInterface $filterExpression);

    /**
     * @param ExpressionInterface $expression
     * @param string $class
     * @param string $method
     * @param array $arguments
     *
     * @return ExpressionInterface
     */
    public function helper(ExpressionInterface $expression, $class, $method, array $arguments = []);
    
    /**
     * @param string $shortcut
     *
     * @return ExpressionInterface
     */
    public function create($shortcut);
}