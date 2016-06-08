<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:01 PM
 */

namespace Vain\Expression\Unary;

use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\ExpressionInterface;

abstract class AbstractUnaryExpression implements UnaryExpressionInterface
{
    private $expression;
    
    public function __construct(ExpressionInterface $expression = null)
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
    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        list ($expressionData) = $serializedData;
        $this->expression = $serializer->unserializeExpression($expressionData);

        return $this;
    }
}