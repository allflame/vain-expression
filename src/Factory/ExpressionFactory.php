<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:05 AM
 */

namespace Vain\Expression\Factory;


use Vain\Comparator\Repository\ComparatorRepositoryInterface;
use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\Equal\EqualExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\Greater\GreaterExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\In\InExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\Less\LessExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\Like\LikeExpression;
use Vain\Expression\Boolean\ZeroAry\Comparison\NotEqual\NotEqualExpression;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\Context\ContextExpression;
use Vain\Expression\NonTerminal\Filter\FilterExpression;
use Vain\Expression\NonTerminal\FunctionX\FunctionExpression;
use Vain\Expression\NonTerminal\Helper\HelperExpression;
use Vain\Expression\NonTerminal\Method\MethodExpression;
use Vain\Expression\NonTerminal\Mode\ModeExpression;
use Vain\Expression\NonTerminal\Property\PropertyExpression;
use Vain\Expression\Terminal\TerminalExpression;

class ExpressionFactory implements ExpressionFactoryInterface
{
    
    private $resultFactory;

    private $comparatorRepository;

    /**
     * ExpressionFactory constructor.
     * @param BooleanResultFactoryInterface $resultFactory
     * @param ComparatorRepositoryInterface $comparatorRepository
     */
    public function __construct(BooleanResultFactoryInterface $resultFactory, ComparatorRepositoryInterface $comparatorRepository)
    {
        $this->resultFactory = $resultFactory;
        $this->comparatorRepository = $comparatorRepository;
    }

    /**
     * @inheritDoc
     */
    public function eq(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new EqualExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function neq(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new NotEqualExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function gt(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new GreaterExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function gte(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new GreaterOrEqualExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function lt(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new LessExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function lte(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new LessOrEqualExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function in(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new InExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function like(ExpressionInterface $what, ExpressionInterface $against, $mode)
    {
        return new LikeExpression($what, $against, $this->comparatorRepository->getComparator($mode), $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function id(BooleanExpressionInterface $expression)
    {
        return new IdentityExpression($expression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function not(BooleanExpressionInterface $expression)
    {
        return new NotExpression($expression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function false()
    {
        return new FalseExpression($this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function true()
    {
        return new TrueExpression($this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function andX(BooleanExpressionInterface $firstExpression, BooleanExpressionInterface $secondExpression)
    {
        return new AndExpression($firstExpression, $secondExpression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function orX(BooleanExpressionInterface $firstExpression, BooleanExpressionInterface $secondExpression)
    {
        return new OrExpression($firstExpression, $secondExpression, $this->resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function terminal($value)
    {
        return new TerminalExpression($value);
    }

    /**
     * @inheritDoc
     */
    public function method(ExpressionInterface $data, ExpressionInterface $method, ExpressionInterface $arguments = null)
    {
        return new MethodExpression($data, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function property(ExpressionInterface $data, ExpressionInterface $property)
    {
        return new PropertyExpression($data, $property);
    }

    /**
     * @inheritDoc
     */
    public function func(ExpressionInterface $data, ExpressionInterface $function, ExpressionInterface $arguments = null)
    {
        return new FunctionExpression($data, $function, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function mode(ExpressionInterface $data, ExpressionInterface $mode)
    {
        return new ModeExpression($data, $mode);
    }

    /**
     * @inheritDoc
     */
    public function filter(ExpressionInterface $data, BooleanExpressionInterface $filter)
    {
        return new FilterExpression($data, $filter);
    }

    /**
     * @inheritDoc
     */
    public function helper(ExpressionInterface $data, ExpressionInterface $class, ExpressionInterface $method, ExpressionInterface $arguments = null)
    {
        return new HelperExpression($data, $class, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function context()
    {
        return new ContextExpression();
    }


//    /**
//     * @inheritDoc
//     */
//    public function create($shortcut)
//    {
//        switch ($shortcut) {
//            case 'true':
//                return $this->true();
//                break;
//            case 'false':
//                return $this->false();
//                break;
//            case 'context':
//                return $this->context();
//                break;
//            case 'in_place':
//                return $this->inPlace();
//                break;
//            case 'mode':
//                return $this->mode();
//                break;
//            case 'module':
//                return $this->module();
//                break;
//            case 'method':
//                return $this->method();
//                break;
//            case 'property':
//                return $this->property();
//                break;
//            case 'function':
//                return $this->func();
//                break;
//            case 'helper':
//                return $this->helper();
//                break;
//            case 'filter':
//                return $this->filter();
//                break;
//            case 'id':
//                return $this->id();
//                break;
//            case 'not':
//                return $this->not();
//                break;
//            case 'eq':
//                return $this->eq();
//                break;
//            case 'neq':
//                return $this->neq();
//                break;
//            case 'gt':
//                return $this->gt();
//                break;
//            case 'gte':
//                return $this->gte();
//                break;
//            case 'lt':
//                return $this->lt();
//                break;
//            case 'lte':
//                return $this->lte();
//                break;
//            case 'in':
//                return $this->in();
//                break;
//            case 'like':
//                return $this->like();
//                break;
//            case 'and':
//                return $this->andX();
//                break;
//            case 'or':
//                return $this->orX();
//                break;
//            default:
//                throw new UnknownExpressionException($this, $shortcut);
//        }
//    }
}