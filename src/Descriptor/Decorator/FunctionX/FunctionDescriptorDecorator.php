<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:24 PM
 */

namespace Vain\Expression\Descriptor\Decorator\FunctionX;

use Vain\Expression\Descriptor\Decorator\AbstractDescriptorDecorator;
use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Exception\UnknownFunctionException;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;

class FunctionDescriptorDecorator extends AbstractDescriptorDecorator
{
    private $functionName;

    private $arguments;

    /**
     * FunctionDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param string $functionName
     * @param array $arguments
     */
    public function __construct(DescriptorInterface $descriptor, $functionName, array $arguments = [])
    {
        $this->functionName = $functionName;
        $this->arguments = $arguments;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        if (0 === count($this->arguments)) {
            return sprintf('%s(%s)', $this->functionName,  parent::parse($parser));
        }

        return sprintf('%s(%s, %s)', $this->functionName, parent::parse($parser), implode(', ', $this->arguments));
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        $data = parent::getValue($runtimeData);

        if (false === function_exists($this->functionName)) {
            throw new UnknownFunctionException($this, $this->functionName);
        }

        return call_user_func($this->functionName, $data, ...$this->arguments);
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['function', [$this->functionName, $this->arguments, parent::serialize($serializer)]];
    }
}