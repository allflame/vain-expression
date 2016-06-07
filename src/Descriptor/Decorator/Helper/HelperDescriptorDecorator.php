<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:29 AM
 */

namespace Vain\Expression\Descriptor\Decorator\Helper;

use Vain\Expression\Descriptor\Decorator\AbstractDescriptorDecorator;
use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Exception\UnknownHelperException;
use Vain\Expression\Serializer\SerializerInterface;

class HelperDescriptorDecorator extends AbstractDescriptorDecorator
{
    private $class;

    private $method;

    private $arguments;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param string $class
     * @param string $method
     */
    public function __construct(DescriptorInterface $descriptor, $class, $method, array $arguments)
    {
        $this->class = $class;
        $this->method = $method;
        $this->arguments = $arguments;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if (0 === count($this->arguments)) {
            return sprintf('%s::%s(%s)', $this->class, $this->method, parent::__toString());
        }

        return sprintf('%s::%s(%s, %s)', $this->class, $this->method, parent::__toString(), implode(', ', $this->arguments));
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        $data = parent::getValue($runtimeData);

        if (false === method_exists($this->class, $this->method)) {
            throw new UnknownHelperException($this, $this->class, $this->method);
        }

        return call_user_func([$this->class, $this->method], $data, ...$this->arguments);
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['helper', [$this->class, $this->method, parent::serialize($serializer)]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($this->class, $this->method, $parentData) = $serialized;

        return parent::unserialize($serializer, $parentData);
    }
}