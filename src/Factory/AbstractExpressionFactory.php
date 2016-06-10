<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:05 AM
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
use Vain\Expression\Boolean\Not\NotExpression;
use Vain\Expression\Boolean\Identity\IdentityExpression;
use Vain\Expression\Terminal\InPlace\InPlaceExpression;
use Vain\Expression\Terminal\Context\ContextExpression;
use Vain\Expression\NonTerminal\Mode\ModeExpression;
use Vain\Expression\NonTerminal\Module\ModuleExpression;
use Vain\Expression\NonTerminal\Filter\FilterExpression;
use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;
use Vain\Expression\NonTerminal\Helper\HelperExpression;
use Vain\Expression\NonTerminal\Property\PropertyExpression;
use Vain\Expression\NonTerminal\Method\MethodExpression;
use Vain\Expression\Exception\UnknownExpressionException;
use Vain\Expression\ExpressionInterface;

abstract class AbstractExpressionFactory implements ExpressionFactoryInterface
{

    /**
     * @inheritDoc
     */
    public function false()
    {
        return new FalseExpression();
    }

    /**
     * @inheritDoc
     */
    public function true()
    {
        return new TrueExpression();
    }

    /**
     * @inheritDoc
     */
    public function context()
    {
        return new ContextExpression();
    }

    /**
     * @inheritDoc
     */
    public function inPlace($value = null)
    {
        return new InPlaceExpression($value);
    }

    /**
     * @inheritDoc
     */
    public function module(ExpressionInterface $expression = null)
    {
        return new ModuleExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function method(ExpressionInterface $expression = null, $method = '', array $arguments = [])
    {
        return new MethodExpression($expression, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function property(ExpressionInterface $expression = null, $property = '')
    {
        return new PropertyExpression($expression, $property);
    }

    /**
     * @inheritDoc
     */
    public function func(ExpressionInterface $expression = null, $functionName = '', array $arguments = [])
    {
        return new FunctionExpression($expression, $functionName, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function mode(ExpressionInterface $expression = null, $mode = '')
    {
        return new ModeExpression($expression, $mode);
    }

    /**
     * @inheritDoc
     */
    public function filter(ExpressionInterface $expression = null, ExpressionInterface $filterExpression = null)
    {
        return new FilterExpression($expression, $filterExpression);
    }

    /**
     * @inheritDoc
     */
    public function helper(ExpressionInterface $expression = null, $class = '', $method = '', array $arguments = [])
    {
        return new HelperExpression($expression, $class, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function id(ExpressionInterface $expression = null)
    {
        return new IdentityExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function not(ExpressionInterface $expression = null)
    {
        return new NotExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function eq(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new EqualExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function neq(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new NotEqualExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function gt(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new GreaterExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function gte(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new GreaterOrEqualExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function lt(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new LessExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function lte(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new LessOrEqualExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function in(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new InExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function like(ExpressionInterface $what = null, ExpressionInterface $against = null)
    {
        return new LikeExpression($what, $against);
    }

    /**
     * @inheritDoc
     */
    public function andX(ExpressionInterface $firstExpression = null, ExpressionInterface $secondExpression = null)
    {
        return new AndExpression($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function orX(ExpressionInterface $firstExpression = null, ExpressionInterface $secondExpression = null)
    {
        return new OrExpression($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function create($shortcut)
    {
        switch ($shortcut) {
            case 'true':
                return $this->true();
                break;
            case 'false':
                return $this->false();
                break;
            case 'context':
                return $this->context();
                break;
            case 'in_place':
                return $this->inPlace();
                break;
            case 'mode':
                return $this->mode();
                break;
            case 'module':
                return $this->module();
                break;
            case 'method':
                return $this->method();
                break;
            case 'property':
                return $this->property();
                break;
            case 'function':
                return $this->func();
                break;
            case 'helper':
                return $this->helper();
                break;
            case 'filter':
                return $this->filter();
                break;
            case 'id':
                return $this->id();
                break;
            case 'not':
                return $this->not();
                break;
            case 'eq':
                return $this->eq();
                break;
            case 'neq':
                return $this->neq();
                break;
            case 'gt':
                return $this->gt();
                break;
            case 'gte':
                return $this->gte();
                break;
            case 'lt':
                return $this->lt();
                break;
            case 'lte':
                return $this->lte();
                break;
            case 'in':
                return $this->in();
                break;
            case 'like':
                return $this->like();
                break;
            case 'and':
                return $this->andX();
                break;
            case 'or':
                return $this->orX();
                break;
            default:
                throw new UnknownExpressionException($this, $shortcut);
        }
    }
}