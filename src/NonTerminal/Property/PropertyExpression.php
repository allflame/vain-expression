<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\NonTerminal\Property;

use Vain\Expression\ExpressionInterface;
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
    public function serialize()
    {
        return json_encode(['property' => $this->property, 'parent' => parent::serialize()]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->property = $serializedData->property;

        return parent::unserialize($serializedData->parent);
    }
}