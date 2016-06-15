<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/14/16
 * Time: 6:07 AM
 */

namespace Vain\Expression\Boolean\ZeroAry\Comparison;

use Vain\Comparator\ComparatorInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\Boolean\ZeroAry\AbstractZeroAryExpression;
use Vain\Expression\ExpressionInterface;

abstract class AbstractComparisonExpression extends AbstractZeroAryExpression implements ComparisonExpressionInterface
{
    private $what;

    private $against;

    private $comparator;

    /**
     * AbstractComparisonExpression constructor.
     * @param ExpressionInterface $what
     * @param ExpressionInterface $against
     * @param ComparatorInterface $comparator
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(ExpressionInterface $what, ExpressionInterface $against, ComparatorInterface $comparator, BooleanResultFactoryInterface $resultFactory)
    {
        $this->what = $what;
        $this->against = $against;
        $this->comparator = $comparator;
        parent::__construct($resultFactory);
    }

    /**
     * @return ExpressionInterface
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * @return ExpressionInterface
     */
    public function getAgainst()
    {
        return $this->against;
    }

    /**
     * @return ComparatorInterface
     */
    public function getComparator()
    {
        return $this->comparator;
    }
}