<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:49 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\ExpressionInterface;

interface ExpressionSerializerInterface
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

    /**
     * @param DescriptorInterface $descriptor
     *
     * @return array
     */
    public function serializeDescriptor(DescriptorInterface $descriptor);

    /**
     * @param array $serializedData
     *
     * @return DescriptorInterface
     */
    public function unserializeDescriptor(array $serializedData);
}