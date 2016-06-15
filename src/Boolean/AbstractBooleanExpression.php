<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/15/16
 * Time: 7:53 AM
 */

namespace Vain\Expression\Boolean;


use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

abstract class AbstractBooleanExpression implements BooleanExpressionInterface
{
    private $resultFactory;

    /**
     * AbstractBooleanExpression constructor.
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