<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:05 AM
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
use Vain\Expression\Exception\UnknownExpressionException;
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
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\Property\PropertyExpression;

class ExpressionFactory implements ExpressionFactoryInterface
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
    public function local()
    {
        return new LocalExpression();
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
    public function module(DataModuleInterface $module = null)
    {
        return new ModuleExpression($module);
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
            case 'local':
                return $this->local();
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