<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:51 AM
 */

namespace Vain\Expression\Descriptor\Decorator;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;

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
    public function parse(ParserInterface $parser)
    {
        return $this->descriptor->parse($parser);
    }
    
    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        return $this->descriptor->getValue($runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return $this->descriptor->serialize($serializer);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        return $this->descriptor->unserialize($serializer, $serialized);
    }
}