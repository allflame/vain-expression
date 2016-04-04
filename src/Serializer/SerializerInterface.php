<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:49 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Expression\ExpressionInterface;

interface SerializerInterface
{
    /**
     * @param ExpressionInterface $expression
     * 
     * @return array
     */
    public function serialize(ExpressionInterface $expression);

    /**
     * @param array $serializedData
     * 
     * @return ExpressionInterface
     */
    public function unserialize(array $serializedData);
}