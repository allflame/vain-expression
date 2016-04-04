<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:58 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\ExpressionInterface;

class ExpressionSerializer implements ExpressionSerializerInterface
{
    private $expressionFactory;

    /**
     * VainExpressionSerializer constructor.
     * @param ExpressionFactoryInterface $expressionFactory
     */
    public function __construct(ExpressionFactoryInterface $expressionFactory)
    {
        $this->expressionFactory = $expressionFactory;
    }

    /**
     * @param ExpressionInterface $expression
     * 
     * @return array
     */
    public function serialize(ExpressionInterface $expression)
    {
        return $expression->serialize($this);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(array $serializedData)
    {
        list ($type, $expressionData) = $serializedData;
        $expression = $this->expressionFactory->create($type);

        return $expression->unserialize($this, $expressionData);
    }
}