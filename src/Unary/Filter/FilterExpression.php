<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 10:57 AM
 */

namespace Vain\Expression\Unary\Filter;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class FilterExpression extends AbstractUnaryExpression
{

    private $filterExpression;

    /**
     * FilterDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param ExpressionInterface $filterExpression
     */
    public function __construct(ExpressionInterface $expression = null, ExpressionInterface $filterExpression = null)
    {
        $this->filterExpression = $filterExpression;
        parent::__construct($expression);
    }

    /**
     * @return ExpressionInterface
     */
    public function getFilterExpression()
    {
        return $this->filterExpression;
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->filter($this);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($serializedExpression, $parentData) = $serialized;
        $this->filterExpression = $serializer->unserializeExpression($serializedExpression);
        
        return parent::unserialize($serializer, $parentData);
    }
}