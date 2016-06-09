<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\NonTerminal\Property;

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
    public function __construct(ExpressionInterface $expression = null, $property = '')
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