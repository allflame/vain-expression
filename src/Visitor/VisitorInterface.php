<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/6/16
 * Time: 12:29 PM
 */

namespace Vain\Expression\Visitor;

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
use Vain\Expression\Terminal\InPlace\InPlaceExpression;
use Vain\Expression\Terminal\Local\LocalExpression;
use Vain\Expression\Terminal\Module\ModuleExpression;
use Vain\Expression\True\TrueExpression;
use Vain\Expression\Unary\Filter\FilterExpression;
use Vain\Expression\Unary\FunctionX\FunctionExpression;
use Vain\Expression\Unary\Helper\HelperExpression;
use Vain\Expression\Unary\Identity\IdentityExpression;
use Vain\Expression\Unary\Method\MethodExpression;
use Vain\Expression\Unary\Mode\ModeExpression;
use Vain\Expression\Unary\Not\NotExpression;
use Vain\Expression\Unary\Property\PropertyExpression;

interface VisitorInterface
{
    /**
     * @param EqualExpression $equalExpression
     *
     * @return mixed
     */
    public function eq(EqualExpression $equalExpression);

    /**
     * @param NotEqualExpression $notEqualExpression
     *
     * @return mixed
     */
    public function neq(NotEqualExpression $notEqualExpression);

    /**
     * @param GreaterExpression $greaterExpression
     *
     * @return mixed
     */
    public function gt(GreaterExpression $greaterExpression);

    /**
     * @param GreaterOrEqualExpression $greaterOrEqualExpression
     *
     * @return mixed
     */
    public function gte(GreaterOrEqualExpression $greaterOrEqualExpression);

    /**
     * @param LessExpression $lessExpression
     *
     * @return mixed
     */
    public function lt(LessExpression $lessExpression);

    /**
     * @param LessOrEqualExpression $lessOrEqualExpression
     *
     * @return mixed
     */
    public function lte(LessOrEqualExpression $lessOrEqualExpression);

    /**
     * @param InExpression $inExpression
     *
     * @return mixed
     */
    public function in(InExpression $inExpression);

    /**
     * @param LikeExpression $likeExpression
     *
     * @return mixed
     */
    public function like(LikeExpression $likeExpression);

    /**
     * @param TrueExpression $trueExpression
     *
     * @return mixed
     */
    public function true(TrueExpression $trueExpression);

    /**
     * @param FalseExpression $falseExpression
     *
     * @return mixed
     */
    public function false(FalseExpression $falseExpression);

    /**
     * @param IdentityExpression $identityExpression
     *
     * @return mixed
     */
    public function id(IdentityExpression $identityExpression);

    /**
     * @param NotExpression $notExpression
     *
     * @return mixed
     */
    public function not(NotExpression $notExpression);

    /**
     * @param AndExpression $andExpression
     *
     * @return mixed
     */
    public function andX(AndExpression $andExpression);

    /**
     * @param OrExpression $orExpression
     *
     * @return mixed
     */
    public function orX(OrExpression $orExpression);

    /**
     * @param InPlaceExpression $inPlaceExpression
     *
     * @return mixed
     */
    public function inPlace(InPlaceExpression $inPlaceExpression);

    /**
     * @param ModuleExpression $moduleExpression
     *
     * @return mixed
     */
    public function module(ModuleExpression $moduleExpression);

    /**
     * @param MethodExpression $methodExpression
     *
     * @return mixed
     */
    public function method(MethodExpression $methodExpression);

    /**
     * @param PropertyExpression $propertyExpression
     *
     * @return mixed
     */
    public function property(PropertyExpression $propertyExpression);

    /**
     * @param FunctionExpression $functionExpression
     *
     * @return mixed
     */
    public function functionX(FunctionExpression $functionExpression);

    /**
     * @param ModeExpression $modeExpression
     *
     * @return mixed
     */
    public function mode(ModeExpression $modeExpression);

    /**
     * @param FilterExpression $filterExpression
     *
     * @return mixed
     */
    public function filter(FilterExpression $filterExpression);

    /**
     * @param HelperExpression $helperExpression
     *
     * @return mixed
     */
    public function helper(HelperExpression $helperExpression);

    /**
     * @param LocalExpression $localExpression
     *
     * @return mixed
     */
    public function local(LocalExpression $localExpression);
}