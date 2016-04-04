<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:58 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Data\Descriptor\DescriptorInterface;
use Vain\Data\Descriptor\Factory\DescriptorFactoryInterface;
use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\ExpressionInterface;

class ExpressionSerializer implements ExpressionSerializerInterface
{
    private $expressionFactory;

    private $descriptorFactory;

    /**
     * VainExpressionSerializer constructor.
     * @param ExpressionFactoryInterface $expressionFactory
     * @param DescriptorFactoryInterface $descriptorFactory
     */
    public function __construct(ExpressionFactoryInterface $expressionFactory, DescriptorFactoryInterface $descriptorFactory)
    {
        $this->expressionFactory = $expressionFactory;
        $this->descriptorFactory = $descriptorFactory;
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
        return $descriptor->serialize($this);
    }

    /**
     * @inheritDoc
     */
    public function unserializeDescriptor(array $serializedData)
    {
        list ($type, $descriptorData) = $serializedData;
        $descriptor = $this->descriptorFactory->create($type);

        return $descriptor->unserialize($descriptorData);
    }


}