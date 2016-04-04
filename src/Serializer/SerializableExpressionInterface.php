<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:50 AM
 */

namespace Vain\Expression\Serializer;

interface SerializableExpressionInterface
{
    /**
     * @param ExpressionSerializerInterface $serializer
     *
     * @return array
     */
    public function serialize(ExpressionSerializerInterface $serializer);

    /**
     * @param ExpressionSerializerInterface $serializer
     * @param array $serializedData
     *
     * @return SerializableExpressionInterface
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serializedData);
}