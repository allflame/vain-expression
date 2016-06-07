<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/7/16
 * Time: 9:42 AM
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