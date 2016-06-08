<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\Unary\Property;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class PropertyExpression extends AbstractUnaryExpression
{

    private $property;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $property
     */
    public function __construct(ExpressionInterface $expression, $property)
    {
        $this->property = $property;
        parent::__construct($expression);
    }

    /**
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $parent = parent::__toString();
        if ('' === $parent) {
            return $this->property;
        }

        return sprintf('%s.%s', $parent, $this->property);
    }

//    /**
//     * @inheritDoc
//     */
//    public function getValue(\ArrayAccess $runtimeData = null)
//    {
//        $data = parent::getValue($runtimeData);
//
//        switch(true) {
//            case is_array($data):
//                if (false === array_key_exists($this->property, $data)) {
//                    throw new UnknownPropertyException($this, $this->property);
//                }
//                return $data[$this->property];
//                break;
//            case $data instanceof \ArrayAccess:
//                if (false === $data->offsetExists($this->property)) {
//                    throw new UnknownPropertyException($this, $this->property);
//                }
//                return $data->offsetGet($this->property);
//                break;
//            case is_object($data):
//                return $data->{$this->property};
//                break;
//            default:
//                throw new InaccessiblePropertyException($this, $data);
//                break;
//        }
//    }
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->property($this);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($this->property, $parentData) = $serialized;

        return parent::unserialize($serializer, $parentData);
    }
}