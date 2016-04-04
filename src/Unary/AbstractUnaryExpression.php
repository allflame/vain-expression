<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:01 PM
 */

namespace Vain\Expression\Unary;

use Vain\Expression\Serializer\ExpressionSerializerInterface;
use Vain\Expression\ExpressionInterface;

abstract class AbstractUnaryExpression implements UnaryExpressionInterface
{
    private $expression;
    
    public function __construct(ExpressionInterface $expression)
    {
        $this->expression = $expression;
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
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return [$this->expression->serialize($serializer)];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serializedData)
    {
        list ($expressionData) = $serializedData;
        $this->expression = $serializer->unserializeExpression($expressionData);

        return $this;
    }
}