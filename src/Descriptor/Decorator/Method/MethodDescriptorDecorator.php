<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\Descriptor\Decorator\Method;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Descriptor\Decorator\AbstractDescriptorDecorator;
use Vain\Expression\Exception\UnknownMethodDescriptorException;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class MethodDescriptorDecorator extends AbstractDescriptorDecorator
{
    private $method;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param string $method
     */
    public function __construct(DescriptorInterface $descriptor, $method)
    {
        $this->method = $method;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        return sprintf('%s.%s', parent::parse($parser), $this->method);
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        $data = parent::getValue($runtimeData);

        if (false === method_exists($data, $this->method)) {
            throw new UnknownMethodDescriptorException($this, $this->method);
        }

        return call_user_func([$data, $this->method]);
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['method', [$this->method, parent::serialize($serializer)]];
    }
}