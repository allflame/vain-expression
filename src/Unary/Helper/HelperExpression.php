<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:29 AM
 */

namespace Vain\Expression\Unary\Helper;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class HelperExpression extends AbstractUnaryExpression
{
    private $class;

    private $method;

    private $arguments;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $class
     * @param string $method
     * @param array $arguments
     */
    public function __construct(ExpressionInterface $expression = null, $class = '', $method = '', array $arguments = [])
    {
        $this->class = $class;
        $this->method = $method;
        $this->arguments = $arguments;
        parent::__construct($expression);
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

//    /**
//     * @inheritDoc
//     */
//    public function getValue(\ArrayAccess $runtimeData = null)
//    {
//        $data = parent::getValue($runtimeData);
//
//        if (false === method_exists($this->class, $this->method)) {
//            throw new UnknownHelperException($this, $this->class, $this->method);
//        }
//
//        return call_user_func([$this->class, $this->method], $data, ...$this->arguments);
//    }
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->helper($this);
    }


    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($this->class, $this->method, $serializedArguments, $parentData) = $serialized;
        $this->arguments = json_decode($serializedArguments, true);

        return parent::unserialize($serializer, $parentData);
    }
}