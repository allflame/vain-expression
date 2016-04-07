<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:51 AM
 */

namespace Vain\Expression\Descriptor\Decorator;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Core\Runtime\RuntimeData;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class AbstractDescriptorDecorator implements DescriptorInterface
{
    private $descriptor;

    /**
     * AbstractDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     */
    public function __construct(DescriptorInterface $descriptor = null)
    {
        $this->descriptor = $descriptor;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->descriptor->__toString();
    }

    /**
     * @inheritDoc
     */
    public function getValue(RuntimeData $runtimeData = null)
    {
        return $this->descriptor->getValue($runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return $this->descriptor->serialize($serializer);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(array $serialized)
    {
        return $this->descriptor->unserialize($serialized);
    }
}