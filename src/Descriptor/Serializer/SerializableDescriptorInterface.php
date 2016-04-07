<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:46 PM
 */

namespace Vain\Expression\Descriptor\Serializer;


use Vain\Expression\Serializer\ExpressionSerializerInterface;

interface SerializableDescriptorInterface
{
    /**
     * @param ExpressionSerializerInterface $serializer
     *
     * @return array
     */
    public function serialize(ExpressionSerializerInterface $serializer);

    /**
     * @param array $serialized
     *
     * @return SerializableDescriptorInterface
     */
    public function unserialize(array $serialized);
}