<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 7:50 PM
 */

namespace Vain\Expression\Descriptor\Local;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Serializer\SerializerInterface;

class LocalDescriptor implements DescriptorInterface
{
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        return $runtimeData;
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['local', []];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        return $this;
    }
}