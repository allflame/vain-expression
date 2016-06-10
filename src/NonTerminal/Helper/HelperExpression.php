<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:29 AM
 */

namespace Vain\Expression\NonTerminal\Helper;

use Vain\Expression\ExpressionInterface;
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
    public function serialize()
    {
        $serializedArguments = [];
        foreach ($this->arguments as $argument) {
            $serializedArguments[] = serialize($argument);
        }

        return json_encode(['class' => $this->class, 'method' => $this->method, 'arguments' => $serializedArguments, 'parent' => parent::serialize()]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->class= $serializedData->class;
        $this->method = $serializedData->method;
        foreach ($serializedData->serializedArguments as $serializedArgument) {
            $this->arguments[] = unserialize($serializedArgument);
        }

        return parent::unserialize($serializedData->parent);
    }
}