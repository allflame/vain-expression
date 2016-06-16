<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\NonTerminal\Property;

use Vain\Expression\Exception\InaccessiblePropertyException;
use Vain\Expression\Exception\UnknownPropertyException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class PropertyExpression implements NonTerminalExpressionInterface
{

    private $data;

    private $property;

    /**
     * PropertyDescriptorDecorator constructor.
     * @param ExpressionInterface $data
     * @param ExpressionInterface $property
     */
    public function __construct(ExpressionInterface $data, ExpressionInterface $property)
    {
        $this->data = $data;
        $this->property = $property;
    }

    /**
     * @return ExpressionInterface
     */
    public function getData()
    {
        return $this->data;
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
    public function interpret(\ArrayAccess $context = null)
    {
        $data = $this->data->interpret($context);
        $property = $this->property->interpret($context);

        switch(true) {
            case is_array($data):
                if (false === array_key_exists($property, $data)) {
                    throw new UnknownPropertyException($this, $context, $data, $property);
                }
                return $data[$property];
                break;
            case $data instanceof \ArrayAccess:
                if (false === $data->offsetExists($property)) {
                    throw new UnknownPropertyException($this, $context, $data, $property);
                }
                return $data->offsetGet($property);
                break;
            case is_object($data):
                if (false === property_exists($data, $property)) {
                    throw new UnknownPropertyException($this, $context, $data, $property);
                }
                return $data->{$property};
                break;
            default:
                throw new InaccessiblePropertyException($this, $context, $data);
                break;
        }
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s.%s', $this->data, $this->property);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['property', ['data' => $this->data->toArray(), 'property' => $this->property->toArray()]];
    }


}