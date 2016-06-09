<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/8/16
 * Time: 9:06 PM
 */

namespace Visitor\Decorator;

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
use Vain\Expression\Boolean\False\FalseExpression;
use Vain\Expression\Boolean\True\TrueExpression;
use Vain\Expression\Boolean\Not\NotExpression;
use Vain\Expression\Boolean\Identity\IdentityExpression;
use Vain\Expression\Terminal\InPlace\InPlaceExpression;
use Vain\Expression\Terminal\Context\ContextExpression;
use Vain\Expression\NonTerminal\Module\ModuleExpression;
use Vain\Expression\NonTerminal\Filter\FilterExpression;
use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;
use Vain\Expression\NonTerminal\Helper\HelperExpression;
use Vain\Expression\NonTerminal\Method\MethodExpression;
use Vain\Expression\NonTerminal\Mode\ModeExpression;
use Vain\Expression\NonTerminal\Property\PropertyExpression;
use Vain\Expression\Visitor\VisitorInterface;

class AbstractVisitorDecorator implements VisitorInterface
{
    private $visitor;

    /**
     * AbstractVisitorDecorator constructor.
     * @param VisitorInterface $visitor
     */
    public function __construct(VisitorInterface $visitor)
    {
        $this->visitor = $visitor;
    }

    /**
     * @return VisitorInterface
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * @inheritDoc
     */
    public function eq(EqualExpression $equalExpression)
    {
        return $this->visitor->eq($equalExpression);
    }

    /**
     * @inheritDoc
     */
    public function neq(NotEqualExpression $notEqualExpression)
    {
        return $this->visitor->neq($notEqualExpression);
    }

    /**
     * @inheritDoc
     */
    public function gt(GreaterExpression $greaterExpression)
    {
        return $this->visitor->gt($greaterExpression);
    }

    /**
     * @inheritDoc
     */
    public function gte(GreaterOrEqualExpression $greaterOrEqualExpression)
    {
        return $this->visitor->gte($greaterOrEqualExpression);
    }

    /**
     * @inheritDoc
     */
    public function lt(LessExpression $lessExpression)
    {
        return $this->visitor->lt($lessExpression);
    }

    /**
     * @inheritDoc
     */
    public function lte(LessOrEqualExpression $lessOrEqualExpression)
    {
        return $this->visitor->lte($lessOrEqualExpression);
    }

    /**
     * @inheritDoc
     */
    public function in(InExpression $inExpression)
    {
        return $this->visitor->in($inExpression);
    }

    /**
     * @inheritDoc
     */
    public function like(LikeExpression $likeExpression)
    {
        return $this->visitor->like($likeExpression);
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $trueExpression)
    {
        return $this->visitor->true($trueExpression);
    }

    /**
     * @inheritDoc
     */
    public function false(FalseExpression $falseExpression)
    {
        return $this->visitor->false($falseExpression);
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $identityExpression)
    {
        return $this->visitor->id($identityExpression);
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $notExpression)
    {
        return $this->visitor->not($notExpression);
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $andExpression)
    {
        return $this->visitor->andX($andExpression);
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $orExpression)
    {
        return $this->visitor->orX($orExpression);
    }

    /**
     * @inheritDoc
     */
    public function inPlace(InPlaceExpression $inPlaceExpression)
    {
        return $this->visitor->inPlace($inPlaceExpression);
    }

    /**
     * @inheritDoc
     */
    public function module(ModuleExpression $moduleExpression)
    {
        return $this->visitor->module($moduleExpression);
    }

    /**
     * @inheritDoc
     */
    public function method(MethodExpression $methodExpression)
    {
        return $this->visitor->method($methodExpression);
    }

    /**
     * @inheritDoc
     */
    public function property(PropertyExpression $propertyExpression)
    {
        return $this->visitor->property($propertyExpression);
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionExpression $functionExpression)
    {
        return $this->visitor->functionX($functionExpression);
    }

    /**
     * @inheritDoc
     */
    public function mode(ModeExpression $modeExpression)
    {
        return $this->visitor->mode($modeExpression);
    }

    /**
     * @inheritDoc
     */
    public function filter(FilterExpression $filterExpression)
    {
        return $this->visitor->filter($filterExpression);
    }

    /**
     * @inheritDoc
     */
    public function helper(HelperExpression $helperExpression)
    {
        return $this->visitor->helper($helperExpression);
    }

    /**
     * @inheritDoc
     */
    public function context(ContextExpression $contextExpression)
    {
        return $this->visitor->context($contextExpression);
    }
}