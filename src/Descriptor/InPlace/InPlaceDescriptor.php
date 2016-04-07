<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:24 PM
 */

namespace Vain\Expression\Descriptor\InPlace;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Core\Runtime\RuntimeData;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class InPlaceDescriptor implements DescriptorInterface
{

    private $value;

    /**
     * InPlaceDescriptor constructor.
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function getValue(RuntimeData $runtimeData = null)
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['in_place', [serialize($this->value)]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(array $serialized)
    {
        list ($serializedValue) = $serialized;
        $this->value = unserialize($serializedValue);

        return $this;
    }
}