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
use Vain\Expression\Exception\InaccessiblePropertyException;
use Vain\Expression\Exception\UnknownPropertyException;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;

class PropertyDescriptorDecorator extends AbstractDescriptorDecorator
{

    private $property;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param string $property
     */
    public function __construct(DescriptorInterface $descriptor, $property)
    {
        $this->property = $property;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        $parent = parent::parse($parser);
        if ('' === $parent) {
            return $this->property;
        }
        
        return sprintf('%s.%s', parent::parse($parser), $this->property);
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        $data = parent::getValue($runtimeData);

        switch(true) {
            case is_array($data):
                if (false === array_key_exists($this->property, $data)) {
                    throw new UnknownPropertyException($this, $this->property);
                }
                return $data[$this->property];
                break;
            case $data instanceof \ArrayAccess:
                if (false === $data->offsetExists($this->property)) {
                    throw new UnknownPropertyException($this, $this->property);
                }
                return $data->offsetGet($this->property);
                break;
            case is_object($data):
                return $data->{$this->property};
                break;
            default:
                throw new InaccessiblePropertyException($this, $data);
                break;
        }
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['property', [$this->property, parent::serialize($serializer)]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($this->property, $parentData) = $serialized;

        return parent::unserialize($serializer, $parentData);
    }
}