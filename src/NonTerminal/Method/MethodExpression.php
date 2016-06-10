<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\NonTerminal\Method;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class MethodExpression extends AbstractUnaryExpression
{
    private $method;

    private $arguments;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $method
     * @param array $arguments
     */
    public function __construct(ExpressionInterface $expression = null, $method = '', array $arguments = [])
    {
        $this->method = $method;
        $this->arguments = $arguments;
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
        return $visitor->method($this);
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        $serializedArguments = [];
        foreach ($this->arguments as $argument) {
            $serializedArguments[] = serialize($argument);
        }

        return json_encode(['method' => $this->method, 'arguments' => $serializedArguments, 'parent' => parent::serialize()]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->method = $serializedData->method;
        foreach ($serializedData->serializedArguments as $serializedArgument) {
            $this->arguments[] = unserialize($serializedArgument);
        }

        return parent::unserialize($serializedData->parent);
    }
}