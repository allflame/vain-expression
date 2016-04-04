<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:05 AM
 */

namespace Vain\Expression\Factory;

use Vain\Expression\Binary\AndX\VainBinaryAndExpression;
use Vain\Expression\Binary\OrX\VainBinaryOrExpression;
use Vain\Expression\Comparison\Equal\VainComparisonEqualExpression;
use Vain\Expression\Comparison\Greater\VainComparisonGreaterExpression;
use Vain\Expression\Comparison\GreaterOrEqual\VainComparisonGreaterOrEqualExpression;
use Vain\Expression\Comparison\In\VainComparisonInExpression;
use Vain\Expression\Comparison\Less\VainComparisonLessExpression;
use Vain\Expression\Comparison\LessOrEqual\VainComparisonLessOrEqualExpression;
use Vain\Expression\Comparison\Like\VainComparisonLikeExpression;
use Vain\Expression\Comparison\NotEqual\VainComparisonNotEqualExpression;
use Vain\Expression\Factory\Exception\VainExpressionFactoryUnknownShortcutException;
use Vain\Expression\Unary\Identity\VainUnaryIdentityExpression;
use Vain\Expression\Unary\Not\VainUnaryNotExpression;
use Vain\Expression\VainExpressionInterface;

class VainExpressionFactory implements VainExpressionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function eq($what, $against, $type = null)
    {
        return new VainComparisonEqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function neq($what, $against, $type = null)
    {
        return new VainComparisonNotEqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function gt($what, $against, $type = null)
    {
       return new VainComparisonGreaterExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function gte($what, $against, $type = null)
    {
        return new VainComparisonGreaterOrEqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function lt($what, $against, $type = null)
    {
        return new VainComparisonLessExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function lte($what, $against, $type = null)
    {
        return new VainComparisonLessOrEqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function in($what, $against, $type = null)
    {
        return new VainComparisonInExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function like($what, $against, $type = null)
    {
       return new VainComparisonLikeExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function id(VainExpressionInterface $expression)
    {
        return new VainUnaryIdentityExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function not(VainExpressionInterface $expression)
    {
       return new VainUnaryNotExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function andX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        return new VainBinaryAndExpression($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function orX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        return new VainBinaryOrExpression($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function create($shortcut)
    {
        switch ($shortcut) {
            case 'eq':
                return $this->eq(null, null, null);
            break;
            case 'neq':
                return $this->neq(null, null, null);
            break;
            case 'gt':
                return $this->gt(null, null, null);
            break;
            case 'gte':
                return $this->gte(null, null, null);
            break;
            case 'lt':
                return $this->lt(null, null, null);
            break;
            case 'lte':
                return $this->lte(null, null, null);
            case 'in':
                return $this->in(null, null, null);
                break;
            case 'like':
                return $this->like(null, null, null);
                break;
            case 'id':
                return $this->id(null);
                break;
            case 'not':
                return $this->not(null);
                break;
            case 'and':
                return $this->andX(null, null);
                break;
            case 'or':
                return $this->orX(null, null);
                break;
            default:
                throw new VainExpressionFactoryUnknownShortcutException($this, $shortcut);
        }
    }


}