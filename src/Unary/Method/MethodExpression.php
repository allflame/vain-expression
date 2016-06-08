<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\Unary\Method;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class MethodExpression extends AbstractUnaryExpression
{
    private $method;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $method
     */
    public function __construct(ExpressionInterface $expression, $method)
    {
        $this->method = $method;
        parent::__construct($expression);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $parent = parent::__toString();
        if ('' === $parent) {
            return $this->method;
        }

        return sprintf('%s.%s', $parent, $this->method);
    }

//    /**
//     * @inheritDoc
//     */
//    public function getValue(\ArrayAccess $runtimeData = null)
//    {
//        $data = parent::getValue($runtimeData);
//
//        if (false === method_exists($data, $this->method)) {
//            throw new UnknownMethodException($this, $this->method);
//        }
//
//        return call_user_func([$data, $this->method]);
//    }
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->method($this);
    }

//    /**
//     * @inheritDoc
//     */
//    public function serialize(SerializerInterface $serializer)
//    {
//        return ['method', [$this->method, parent::serialize($serializer)]];
//    }

    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        list ($this->method, $parentData) = $serializedData;

        return parent::unserialize($serializer, $serializedData);
    }
}