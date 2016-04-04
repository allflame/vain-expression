<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:49 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Data\Descriptor\Serializer\DescriptorSerializerInterface;
use Vain\Expression\ExpressionInterface;

interface ExpressionSerializerInterface extends DescriptorSerializerInterface
{
    /**
     * @param ExpressionInterface $expression
     * 
     * @return array
     */
    public function serializeExpression(ExpressionInterface $expression);

    /**
     * @param array $serializedData
     * 
     * @return ExpressionInterface
     */
    public function unserializeExpression(array $serializedData);
}