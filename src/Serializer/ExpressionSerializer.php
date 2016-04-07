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

        switch ($type) {
            case 'in_place':
                return $this->descriptorFactory->inplace()->unserialize($this, $descriptorData);
                break;
            case 'module':
                list ($moduleName) = $descriptorData;
                return $this->descriptorFactory->module($moduleName);
                break;
            case 'property':
                list ($property, $propertyDescriptorData) = $descriptorData;
                return $this->descriptorFactory->property($this->unserializeDescriptor($propertyDescriptorData), $property);
                break;
            case 'method':
                list ($method, $methodDescriptorData) = $descriptorData;
                return $this->descriptorFactory->method($this->unserializeDescriptor($methodDescriptorData), $method);
                break;
            case 'mode':
                list ($mode, $modeDescriptorData) = $descriptorData;
                return $this->descriptorFactory->mode($this->unserializeDescriptor($modeDescriptorData), $mode);
            default:
                throw new UnknownDescriptorSerializerException($this, $type);
        }
    }
}