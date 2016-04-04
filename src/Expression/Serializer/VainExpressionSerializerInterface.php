<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:49 AM
 */

namespace Vain\Expression\Serializer;


use Vain\Expression\VainExpressionInterface;

interface VainExpressionSerializerInterface
{
    /**
     * @param VainExpressionInterface $expression
     * 
     * @return array
     */
    public function serialize(VainExpressionInterface $expression);

    /**
     * @param array $serializedData
     * 
     * @return VainExpressionInterface
     */
    public function unserialize(array $serializedData);
}