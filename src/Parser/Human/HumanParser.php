<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/7/16
 * Time: 1:07 PM
 */

namespace Vain\Expression\Parser\Human;

use Vain\Expression\Binary\AndX\AndExpression;
use Vain\Expression\Binary\Equal\EqualExpression;
use Vain\Expression\Binary\Greater\GreaterExpression;
use Vain\Expression\Binary\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Binary\In\InExpression;
use Vain\Expression\Binary\Less\LessExpression;
use Vain\Expression\Binary\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Binary\Like\LikeExpression;
use Vain\Expression\Binary\NotEqual\NotEqualExpression;
use Vain\Expression\Binary\OrX\OrExpression;
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
use Vain\Expression\Visitor\VisitorInterface;

class HumanParser implements VisitorInterface
{
    /**
     * @inheritDoc
     */
    public function true(TrueExpression $trueExpression)
    {
        return 'true';
    }

    /**
     * @inheritDoc
     */
    public function false(FalseExpression $falseExpression)
    {
        return 'false';
    }

    /**
     * @inheritDoc
     */
    public function inPlace(InPlaceExpression $inPlaceExpression)
    {
        return (string)$inPlaceExpression->getValue();
    }

    /**
     * @inheritDoc
     */
    public function module(ModuleExpression $moduleExpression)
    {
        return $moduleExpression->getModule()->__toString();
    }

    /**
     * @inheritDoc
     */
    public function local(LocalExpression $localExpression)
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function method(MethodExpression $methodExpression)
    {
        if (0 === count($methodExpression->getArguments())) {
            return sprintf('%s->%s()', $methodExpression->getExpression()->accept($this), $methodExpression->getMethod());
        }

        return sprintf('%s->%s(%s)', $methodExpression->getExpression()->accept($this), $methodExpression->getMethod(), implode(', ', $methodExpression->getArguments()));
    }

    /**
     * @inheritDoc
     */
    public function property(PropertyExpression $propertyExpression)
    {
        return sprintf('%s.%s', $propertyExpression->accept($this), $propertyExpression->getProperty());
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionExpression $functionExpression)
    {
        if (0 === count($functionExpression->getArguments())) {
            return sprintf('%s(%s)', $functionExpression->getFunctionName(),  $functionExpression->getExpression()->accept($this));
        }

        return sprintf('%s(%s, %s)', $functionExpression->getFunctionName(), $functionExpression->getExpression()->accept($this), implode(', ', $functionExpression->getArguments()));
    }

    /**
     * @inheritDoc
     */
    public function mode(ModeExpression $modeExpression)
    {
        $value = $modeExpression->getExpression()->accept($this);
        switch ($modeExpression->getMode()) {
            case 'string':
                return sprintf('"%s"', $modeExpression->getExpression()->accept($this));
                break;
            case 'float':
            case 'double':
                return (float)$value;
                break;
            case 'bool':
            case 'boolean':
                return ($value) ? 'true' : 'false';
                break;
            case 'time':
                return $value->format(DATE_W3C);
                break;
            default:
                return (string)$value;
        }
    }

    /**
     * @inheritDoc
     */
    public function filter(FilterExpression $filterExpression)
    {
        return sprintf('%s where %s', $filterExpression->getExpression()->accept($this), $filterExpression->getFilterExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function helper(HelperExpression $helperExpression)
    {
        if (0 === count($helperExpression->getArguments())) {
            return sprintf('%s::%s(%s)', $helperExpression->getClass(), $helperExpression->getMethod(), $helperExpression->getExpression()->accept($this));
        }

        return sprintf('%s::%s(%s, %s)', $helperExpression->getClass(), $helperExpression->getMethod(), $helperExpression->getExpression()->accept($this), implode(', ', $helperExpression->getArguments()));
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $identityExpression)
    {
        return $identityExpression->getExpression()->accept($this);
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $notExpression)
    {
        return sprintf('!%s', $notExpression->getExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function eq(EqualExpression $equalExpression)
    {
        return sprintf('%s = %s', $equalExpression->getFirstExpression()->accept($this), $equalExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function neq(NotEqualExpression $notEqualExpression)
    {
        return sprintf('%s != %s', $notEqualExpression->getFirstExpression()->accept($this), $notEqualExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function gt(GreaterExpression $greaterExpression)
    {
        return sprintf('%s > %s', $greaterExpression->getFirstExpression()->accept($this), $greaterExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function gte(GreaterOrEqualExpression $greaterOrEqualExpression)
    {
        return sprintf('%s >= %s', $greaterOrEqualExpression->getFirstExpression()->accept($this), $greaterOrEqualExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function lt(LessExpression $lessExpression)
    {
        return sprintf('%s < %s', $lessExpression->getFirstExpression()->accept($this), $lessExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function lte(LessOrEqualExpression $lessOrEqualExpression)
    {
        return sprintf('%s <= %s', $lessOrEqualExpression->getFirstExpression()->accept($this), $lessOrEqualExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function in(InExpression $inExpression)
    {
        return sprintf('%s in (%s)', $inExpression->getFirstExpression()->accept($this), $inExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function like(LikeExpression $likeExpression)
    {
        return sprintf('%s like %s', $likeExpression->getFirstExpression()->accept($this), $likeExpression->getSecondExpression()->accept($this));
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $andExpression)
    {
        return sprintf('%s and %s', $andExpression->getFirstExpression(), $andExpression->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $orExpression)
    {
        return sprintf('%s or %s', $orExpression->getFirstExpression(), $orExpression->getSecondExpression());
    }
}