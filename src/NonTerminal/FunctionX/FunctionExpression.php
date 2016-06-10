<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:24 PM
 */

namespace Vain\Expression\NonTerminal\FunctionX;

use Vain\Expression\ExpressionInterface;
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

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        $serializedArguments = [];
        foreach ($this->arguments as $argument) {
            $serializedArguments[] = serialize($argument);
        }

        return json_encode(['functionName' => $this->functionName, 'arguments' => $serializedArguments, 'parent' => parent::serialize()]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->functionName = $serializedData->functionName;
        foreach ($serializedData->serializedArguments as $serializedArgument) {
            $this->arguments[] = unserialize($serializedArgument);
        }

        return parent::unserialize($serializedData->parent);
    }
}