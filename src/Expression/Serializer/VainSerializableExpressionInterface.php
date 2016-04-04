<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:50 AM
 */

namespace Vain\Expression\Serializer;


interface VainSerializableExpressionInterface
{
    /**
     * @param VainExpressionSerializerInterface $serializer
     *
     * @return array
     */
    public function serialize(VainExpressionSerializerInterface $serializer);

    /**
     * @param VainExpressionSerializerInterface $serializer
     * @param array $serializedData
     *
     * @return VainSerializableExpressionInterface
     */
    public function unserialize(VainExpressionSerializerInterface $serializer, array $serializedData);
}