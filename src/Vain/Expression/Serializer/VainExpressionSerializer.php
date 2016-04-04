<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:58 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Expression\Factory\VainExpressionFactoryInterface;
use Vain\Expression\VainExpressionInterface;

class VainExpressionSerializer implements VainExpressionSerializerInterface
{
    private $expressionFactory;

    /**
     * VainExpressionSerializer constructor.
     * @param VainExpressionFactoryInterface $expressionFactory
     */
    public function __construct(VainExpressionFactoryInterface $expressionFactory)
    {
        $this->expressionFactory = $expressionFactory;
    }

    /**
     * @param VainExpressionInterface $expression
     * 
     * @return array
     */
    public function serialize(VainExpressionInterface $expression)
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