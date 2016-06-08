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
use Vain\Expression\True\TrueExpression;
use Vain\Expression\Unary\Identity\IdentityExpression;
use Vain\Expression\Unary\Not\NotExpression;
use Vain\Expression\ExpressionInterface;

class ExpressionFactory implements ExpressionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function eq($what, $against, $type = null)
    {
        return new EqualExpression($what, $against);
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
                return $this->true();
                break;
            case 'false':
                return $this->false();
                break;
            case 'and':
                return $this->andX(null, null);
                break;
            case 'or':
                return $this->orX(null, null);
                break;
            default:
                throw new UnknownExpressionException($this, $shortcut);
        }
    }
}