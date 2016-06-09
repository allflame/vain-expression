<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:58 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Expression\Boolean\AndX\AndExpression;
use Vain\Expression\Boolean\Equal\EqualExpression;
use Vain\Expression\Boolean\Greater\GreaterExpression;
use Vain\Expression\Boolean\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Boolean\In\InExpression;
use Vain\Expression\Boolean\Less\LessExpression;
use Vain\Expression\Boolean\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Boolean\Like\LikeExpression;
use Vain\Expression\Boolean\NotEqual\NotEqualExpression;
use Vain\Expression\Boolean\OrX\OrExpression;
use Vain\Expression\Boolean\Not\NotExpression;
use Vain\Expression\Boolean\False\FalseExpression;
use Vain\Expression\Boolean\True\TrueExpression;
use Vain\Expression\Boolean\Identity\IdentityExpression;
use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\Terminal\InPlace\InPlaceExpression;
use Vain\Expression\Terminal\Context\ContextExpression;
use Vain\Expression\NonTerminal\Module\ModuleExpression;
use Vain\Expression\NonTerminal\Filter\FilterExpression;
use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;
use Vain\Expression\NonTerminal\Helper\HelperExpression;
use Vain\Expression\NonTerminal\Method\MethodExpression;
use Vain\Expression\NonTerminal\Mode\ModeExpression;
use Vain\Expression\NonTerminal\Property\PropertyExpression;

class Serializer implements SerializerInterface
{
    private $expressionFactory;

    /**
     * VainExpressionSerializer constructor.
     * @param ExpressionFactoryInterface $expressionFactory
     */
    public function __construct(ExpressionFactoryInterface $expressionFactory)
    {
        $this->expressionFactory = $expressionFactory;
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $trueExpression)
    {
        return ['true', []];
    }

    /**
     * @inheritDoc
     */
    public function false(FalseExpression $falseExpression)
    {
        return ['false', []];
    }

    /**
     * @inheritDoc
     */
    public function context(ContextExpression $contextExpression)
    {
        return ['context', []];
    }

    /**
     * @inheritDoc
     */
    public function inPlace(InPlaceExpression $inPlaceExpression)
    {
        return ['in_place', [serialize($inPlaceExpression->getValue())]];
    }

    /**
     * @inheritDoc
     */
    public function module(ModuleExpression $moduleExpression)
    {
        return ['module', [$moduleExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $identityExpression)
    {
        return ['id', [$identityExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $notExpression)
    {
        return ['not', [$notExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function method(MethodExpression $methodExpression)
    {
        return ['method', [$methodExpression->getMethod(), $methodExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function property(PropertyExpression $propertyExpression)
    {
        return ['property', [$propertyExpression->getProperty(), $propertyExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionExpression $functionExpression)
    {
        return ['function', [$functionExpression->getFunctionName(), json_encode($functionExpression->getArguments()), $functionExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function mode(ModeExpression $modeExpression)
    {
        return ['mode', [$modeExpression->getMode(), $modeExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function filter(FilterExpression $filterExpression)
    {
        return ['filter', [$filterExpression->getFilterExpression()->accept($this), $filterExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function helper(HelperExpression $helperExpression)
    {
        return ['helper', [$helperExpression->getClass(), $helperExpression->getMethod(), json_encode($helperExpression->getArguments()), $helperExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function eq(EqualExpression $equalExpression)
    {
        return ['eq', [$equalExpression->getFirstExpression()->accept($this), $equalExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function neq(NotEqualExpression $notEqualExpression)
    {
        return ['neq', [$notEqualExpression->getFirstExpression()->accept($this), $notEqualExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function gt(GreaterExpression $greaterExpression)
    {
        return ['gt', [$greaterExpression->getFirstExpression()->accept($this), $greaterExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function gte(GreaterOrEqualExpression $greaterOrEqualExpression)
    {
        return ['gte', [$greaterOrEqualExpression->getFirstExpression()->accept($this), $greaterOrEqualExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function lt(LessExpression $lessExpression)
    {
        return ['lt', [$lessExpression->getFirstExpression()->accept($this), $lessExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function lte(LessOrEqualExpression $lessOrEqualExpression)
    {
        return ['lte', [$lessOrEqualExpression->getFirstExpression()->accept($this), $lessOrEqualExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function in(InExpression $inExpression)
    {
        return ['in', [$inExpression->getFirstExpression()->accept($this), $inExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function like(LikeExpression $likeExpression)
    {
        return ['like', [$likeExpression->getFirstExpression()->accept($this), $likeExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $andExpression)
    {
        return ['and', [$andExpression->getFirstExpression()->accept($this), $andExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $orExpression)
    {
        return ['or', [$orExpression->getFirstExpression()->accept($this), $orExpression->getSecondExpression()->accept($this)]];
    }


    /**
     * @inheritDoc
     */
    public function unserializeExpression(array $serializedData)
    {
        list ($type, $expressionData) = $serializedData;
        $expression = $this->expressionFactory->create($type);

        return $expression->unserialize($this, $expressionData);
    }
}