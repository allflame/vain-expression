<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:24 PM
 */

namespace Vain\Expression\Terminal\FunctionX;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Terminal\TerminalExpressionInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class FunctionExpression extends AbstractUnaryExpression implements TerminalExpressionInterface
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


    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        list ($this->functionName, $serializedArguments, $parentData) = $serializedData;
        $this->arguments = json_decode($serializedArguments, true);

        return parent::unserialize($serializer, $parentData);
    }
}