<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 10:16 AM
 */

namespace Vain\Expression\Descriptor\Decorator\Mode;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Descriptor\Decorator\AbstractDescriptorDecorator;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;

class ModeDescriptorDecorator extends AbstractDescriptorDecorator
{
    private $mode;

    /**
     * ModeDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param string $mode
     */
    public function __construct(DescriptorInterface $descriptor, $mode)
    {
        $this->mode = $mode;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        $value = parent::getValue($runtimeData);

        switch ($this->mode) {
            case 'int':
                return (int)$value;
                break;
            case 'string':
                return (string)$value;
                break;
            case 'float':
            case 'double':
                return (float)$value;
                break;
            case 'bool':
            case 'boolean':
                return (bool)$value;
                break;
            default:
                return $value;
        }
    }
    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        $value = parent::parse($parser);
        switch ($this->mode) {
            case 'string':
                return sprintf('"%s"', $value);
                break;
            case 'float':
            case 'double':
                return (float)$value;
                break;
            case 'bool':
            case 'boolean':
                return ($value) ? 'true' : 'false';
                break;
            case 'time':
                return $value->format(DATE_W3C);
                break;
            default:
                return (string)$value;
        }
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['mode', [$this->mode, parent::serialize($serializer)]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($this->mode, $parentData) = $serialized;

        return parent::unserialize($serializer, $parentData);
    }
}