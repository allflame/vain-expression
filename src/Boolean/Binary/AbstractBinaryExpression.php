<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */

namespace Vain\Expression\Boolean\Binary;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

abstract class AbstractBinaryExpression implements BinaryExpressionInterface
{
    private $firstExpression;
    
    private $secondExpression;

    private $resultFactory;

    /**
     * AbstractBinaryExpression constructor.
     * @param BooleanExpressionInterface $firstExpression
     * @param BooleanExpressionInterface $secondExpression
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanExpressionInterface $firstExpression, BooleanExpressionInterface $secondExpression, BooleanResultFactoryInterface $resultFactory)
    {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
        $this->resultFactory = $resultFactory;
    }

    /**
     * @inheritDoc
     */
    public function getFirstExpression()
    {
        return $this->firstExpression;
    }

    /**
     * @inheritDoc
     */
    public function getSecondExpression()
    {
        return $this->secondExpression;
    }

    /**
     * @return BooleanResultFactoryInterface
     */
    public function getResultFactory()
    {
        return $this->resultFactory;
    }
}