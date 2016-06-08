<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:24 PM
 */

namespace Vain\Expression\Unary\FunctionX;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class FunctionExpression extends AbstractUnaryExpression
{
    private $functionName;

    private $arguments;

    /**
     * FunctionDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $functionName
     * @param array $arguments
     */
    public function __construct(ExpressionInterface $expression, $functionName = '', array $arguments = [])
    {
        $this->functionName = $functionName;
        $this->arguments = $arguments;
        parent::__construct($expression);
    }

    /**
     * @return string
     */
    public function getFunctionName()
    {
        return $this->functionName;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->functionX($this);
    }


//    /**
//     * @inheritDoc
//     */
//    public function getValue(\ArrayAccess $runtimeData = null)
//    {
//        $data = parent::getValue($runtimeData);
//
//        if (false === function_exists($this->functionName)) {
//            throw new UnknownFunctionException($this, $this->functionName);
//        }
//
//        return call_user_func($this->functionName, $data, ...$this->arguments);
//    }

//    /**
//     * @inheritDoc
//     */
//    public function serialize(SerializerInterface $serializer)
//    {
//        return ['function', [$this->functionName, $this->arguments, parent::serialize($serializer)]];
//    }

    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        list ($this->functionName, $serializedArguments, $parentData) = $serializedData;
        $this->arguments = json_decode($serializedArguments, true);

        return parent::unserialize($serializer, $parentData);
    }
}