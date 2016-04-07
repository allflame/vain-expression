<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:58 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Descriptor\Factory\DescriptorFactoryInterface;
use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Exception\UnknownDescriptorSerializerException;

class Serializer implements SerializerInterface
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

        switch ($type) {
            case 'in_place':
                return $this->descriptorFactory->inplace()->unserialize($this, $descriptorData);
                break;
            case 'local':
                return $this->descriptorFactory->local();
                break;
            case 'module':
                list ($moduleName) = $descriptorData;
                return $this->descriptorFactory->module($moduleName);
                break;
            case 'property':
                list ($property, $parentDescriptorData) = $descriptorData;
                return $this->descriptorFactory->property($this->unserializeDescriptor($parentDescriptorData), $property);
                break;
            case 'method':
                list ($method, $arguments, $parentDescriptorData) = $descriptorData;
                return $this->descriptorFactory->method($this->unserializeDescriptor($parentDescriptorData), $method, $arguments);
                break;
            case 'mode':
                list ($mode, $parentDescriptorData) = $descriptorData;
                return $this->descriptorFactory->mode($this->unserializeDescriptor($parentDescriptorData), $mode);
                break;
            case 'function':
                list ($function, $arguments, $parentDescriptorData) = $descriptorData;
                return $this->descriptorFactory->func($this->unserializeDescriptor($parentDescriptorData), $function, $arguments);
                break;
            case 'filter':
                list ($serializedExpression, $parentDescriptorData) = $descriptorData;
                return $this->descriptorFactory->filter($this->unserializeDescriptor($parentDescriptorData), $this->unserializeExpression($serializedExpression));
                break;
            default:
                throw new UnknownDescriptorSerializerException($this, $type);
                break;
        }
    }
}