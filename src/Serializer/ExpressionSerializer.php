<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:58 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Data\Descriptor\DescriptorInterface;
use Vain\Data\Descriptor\Serializer\DescriptorSerializerInterface;
use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\ExpressionInterface;

class ExpressionSerializer implements ExpressionSerializerInterface
{
    private $expressionFactory;

    private $descriptorSerializer;

    /**
     * VainExpressionSerializer constructor.
     * @param ExpressionFactoryInterface $expressionFactory
     * @param DescriptorSerializerInterface $descriptorSerializer
     */
    public function __construct(ExpressionFactoryInterface $expressionFactory, DescriptorSerializerInterface $descriptorSerializer)
    {
        $this->expressionFactory = $expressionFactory;
        $this->descriptorSerializer = $descriptorSerializer;
    }

    /**
     * @param ExpressionInterface $expression
     * 
     * @return array
     */
    public function serializeExpression(ExpressionInterface $expression)
    {
        return $expression->serialize($this);
    }

    /**
     * @inheritDoc
     */
    public function unserializeExpression(array $serializedData)
    {
        list ($type, $expressionData) = $serializedData;
        $expression = $this->expressionFactory->create($type);

        return $expression->unserialize($this, $expressionData);
    }

    /**
     * @inheritDoc
     */
    public function serializeDescriptor(DescriptorInterface $descriptor)
    {
        return $this->descriptorSerializer->serializeDescriptor($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function unserializeDescriptor(array $serializedData)
    {
        return $this->descriptorSerializer->unserializeDescriptor($serializedData);
    }
}