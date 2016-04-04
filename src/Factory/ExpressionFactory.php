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
use Vain\Expression\Comparison\Equal\EqualExpression;
use Vain\Expression\Comparison\Greater\GreaterExpression;
use Vain\Expression\Comparison\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Comparison\In\InExpression;
use Vain\Expression\Comparison\Less\LessExpression;
use Vain\Expression\Comparison\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Comparison\Like\LikeExpression;
use Vain\Expression\Comparison\NotEqual\NotEqualExpression;
use Vain\Expression\Factory\Exception\UnknownShortcutExpressionFactoryException;
use Vain\Expression\Unary\False\FalseExpression;
use Vain\Expression\Unary\Identity\IdentityExpression;
use Vain\Expression\Unary\Not\NotExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\True\TrueExpression;

class ExpressionFactory implements ExpressionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function eq($what, $against, $type = null)
    {
        return new EqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function neq($what, $against, $type = null)
    {
        return new NotEqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function gt($what, $against, $type = null)
    {
        return new GreaterExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function gte($what, $against, $type = null)
    {
        return new GreaterOrEqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function lt($what, $against, $type = null)
    {
        return new LessExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function lte($what, $against, $type = null)
    {
        return new LessOrEqualExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function in($what, $against, $type = null)
    {
        return new InExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function like($what, $against, $type = null)
    {
        return new LikeExpression($what, $against, $type);
    }

    /**
     * @inheritDoc
     */
    public function id(ExpressionInterface $expression)
    {
        return new IdentityExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function not(ExpressionInterface $expression)
    {
        return new NotExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function false(ExpressionInterface $expression)
    {
        return new FalseExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function true(ExpressionInterface $expression)
    {
        return new TrueExpression($expression);
    }

    /**
     * @inheritDoc
     */
    public function andX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return new AndExpression($firstExpression, $secondExpression);
    }

    /**
     * @inheritDoc
     */
    public function orX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression)
    {
        return new OrExpression($firstExpression, $secondExpression);
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
                break;
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
            case 'true':
                return $this->true(null);
                break;
            case 'false':
                return $this->false(null);
                break;
            case 'and':
                return $this->andX(null, null);
                break;
            case 'or':
                return $this->orX(null, null);
                break;
            default:
                throw new UnknownShortcutExpressionFactoryException($this, $shortcut);
        }
    }


}