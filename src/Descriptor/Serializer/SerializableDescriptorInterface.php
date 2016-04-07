<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:46 PM
 */

namespace Vain\Expression\Descriptor\Serializer;


use Vain\Expression\Serializer\SerializerInterface;

interface SerializableDescriptorInterface
{
    /**
     * @param SerializerInterface $serializer
     *
     * @return array
     */
    public function serialize(SerializerInterface $serializer);

    /**
     * @param SerializerInterface $serializer
     * @param array $serialized
     *
     * @return SerializableDescriptorInterface
     */
    public function unserialize(SerializerInterface $serializer, array $serialized);
}