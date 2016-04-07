<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\Descriptor\Decorator\Property;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Descriptor\Decorator\AbstractDescriptorDecorator;
use Vain\Expression\Descriptor\Exception\InaccessiblePropertyDescriptorException;
use Vain\Expression\Descriptor\Exception\UnknownPropertyDescriptorException;
use Vain\Core\Runtime\RuntimeData;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class PropertyDescriptorDecorator extends AbstractDescriptorDecorator
{

    private $property;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param string $property
     */
    public function __construct(DescriptorInterface $descriptor = null, $property = null)
    {
        $this->property = $property;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s.%s', parent::__toString(), $this->property);
    }

    /**
     * @inheritDoc
     */
    public function getValue(RuntimeData $runtimeData = null)
    {
        $data = parent::getValue($runtimeData);

        switch(true) {
            case is_array($data):
                if (false === array_key_exists($this->property, $data)) {
                    throw new UnknownPropertyDescriptorException($this, $this->property);
                }
                return $data[$this->property];
                break;
            case $data instanceof \ArrayAccess:
                if (false === $data->offsetExists($this->property)) {
                    throw new UnknownPropertyDescriptorException($this, $this->property);
                }
                return $data->offsetGet($this->property);
                break;
            case is_object($data):
                if (false === isset($data->{$this->property})) {
                    throw new UnknownPropertyDescriptorException($this, $this->property);
                }
                return $data->{$this->property};
                break;
            default:
                throw new InaccessiblePropertyDescriptorException($this, $data);
                break;
        }
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['property', [$this->property, parent::serialize($serializer)]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(array $serialized)
    {
        list ($this->property, $parentData) = $serialized;

        return parent::unserialize($parentData);
    }
}