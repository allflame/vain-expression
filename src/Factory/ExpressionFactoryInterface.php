<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:47 AM
 */
namespace Vain\Expression\Factory;

use Vain\Expression\Boolean\AndX\AndExpression;
use Vain\Expression\Boolean\OrX\OrExpression;
use Vain\Expression\Boolean\Equal\EqualExpression;
use Vain\Expression\Boolean\Greater\GreaterExpression;
use Vain\Expression\Boolean\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Boolean\In\InExpression;
use Vain\Expression\Boolean\Less\LessExpression;
use Vain\Expression\Boolean\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Boolean\Like\LikeExpression;
use Vain\Expression\Boolean\NotEqual\NotEqualExpression;
use Vain\Expression\Boolean\False\FalseExpression;
use Vain\Expression\Boolean\True\TrueExpression;
use Vain\Expression\Boolean\Identity\IdentityExpression;
use Vain\Expression\Boolean\Not\NotExpression;
use Vain\Expression\NonTerminal\Filter\FilterExpression;
use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;
use Vain\Expression\NonTerminal\Helper\HelperExpression;
use Vain\Expression\NonTerminal\Method\MethodExpression;
use Vain\Expression\NonTerminal\Mode\ModeExpression;
use Vain\Expression\NonTerminal\Module\ModuleExpression;
use Vain\Expression\NonTerminal\Property\PropertyExpression;
use Vain\Expression\Terminal\InPlace\InPlaceExpression;
use Vain\Expression\Terminal\Local\LocalExpression;
use Vain\Expression\ExpressionInterface;

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
     * @return InPlaceExpression
     */
    public function inPlace($value = null);

    /**
     * @return LocalExpression
     */
    public function local();

    /**
     * @param ExpressionInterface $expression
     *
     * @return ModuleExpression
     */
    public function module(ExpressionInterface $expression = null);

    /**
     * @param ExpressionInterface $expression
     * @param string $method
     * @param array $arguments
     *
     * @return MethodExpression
     */
    public function method(ExpressionInterface $expression = null, $method = '', array $arguments = []);

    /**
     * @param ExpressionInterface $expression
     * @param string $property
     *
     * @return PropertyExpression
     */
    public function property(ExpressionInterface $expression = null, $property = '');

    /**
     * @param ExpressionInterface $expression
     * @param string $functionName
     * @param array $arguments
     *
     * @return FunctionExpression
     */
    public function func(ExpressionInterface $expression = null, $functionName = '', array $arguments = []);

    /**
     * @param ExpressionInterface $expression
     * @param string $mode
     *
     * @return ModeExpression
     */
    public function mode(ExpressionInterface $expression = null, $mode = '');

    /**
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $filterExpression
     *
     * @return FilterExpression
     */
    public function filter(ExpressionInterface $expression = null, ExpressionInterface $filterExpression = null);

    /**
     * @param ExpressionInterface $expression
     * @param string $class
     * @param string $method
     * @param array $arguments
     *
     * @return HelperExpression
     */
    public function helper(ExpressionInterface $expression = null, $class = '', $method = '', array $arguments = []);
    
    /**
     * @param string $shortcut
     *
     * @return ExpressionInterface
     */
    public function create($shortcut);
}