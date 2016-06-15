<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/10/16
 * Time: 10:36 AM
 */

namespace Vain\Expression\Boolean\ZeroAry;

use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

abstract class AbstractZeroAryExpression implements ZeroAryExpressionInterface
{
    private $resultFactory;

    /**
     * AbstractZeroAryExpression constructor.
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanResultFactoryInterface $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * @return BooleanResultFactoryInterface
     */
    public function getResultFactory()
    {
        return $this->resultFactory;
    }
}