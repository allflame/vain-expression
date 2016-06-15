<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:01 PM
 */

namespace Vain\Expression\Boolean\Unary;

use Vain\Expression\Boolean\AbstractBooleanExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

abstract class AbstractUnaryExpression extends AbstractBooleanExpression implements UnaryExpressionInterface
{
    private $expression;

    /**
     * AbstractUnaryExpression constructor.
     * @param BooleanExpressionInterface $expression
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanExpressionInterface $expression, BooleanResultFactoryInterface $resultFactory)
    {
        $this->expression = $expression;
        parent::__construct($resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function getExpression()
    {
        return $this->expression;
    }
    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode(['expression' => serialize($this->expression)]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serializedString)
    {
        $serializedData = json_decode($serializedString);
        $this->expression = unserialize($serializedData->expression);

        return $this;
    }
}