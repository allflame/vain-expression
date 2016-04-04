<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:50 AM
 */

namespace Vain\Expression\Serializer;

interface SerializableInterface
{
    /**
     * @param SerializerInterface $serializer
     *
     * @return array
     */
    public function serialize(SerializerInterface $serializer);

    /**
     * @param SerializerInterface $serializer
     * @param array $serializedData
     *
     * @return SerializableInterface
     */
    public function unserialize(SerializerInterface $serializer, array $serializedData);
}