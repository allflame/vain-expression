<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 10:57 AM
 */

namespace Vain\Expression\Descriptor\Decorator\Filter;

use Vain\Expression\Descriptor\Decorator\AbstractDescriptorDecorator;
use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Descriptor\Exception\InaccessibleFilterDescriptorException;
use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class FilterDescriptorDecorator extends AbstractDescriptorDecorator
{

    private $evaluator;

    private $expression;

    /**
     * FilterDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param ExpressionEvaluatorInterface $evaluator
     * @param ExpressionInterface $expression
     */
    public function __construct(DescriptorInterface $descriptor, ExpressionEvaluatorInterface $evaluator, ExpressionInterface $expression)
    {
        $this->evaluator = $evaluator;
        $this->expression = $expression;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        $value = parent::getValue($runtimeData);

        if (false === $value instanceof \Traversable) {
            throw new InaccessibleFilterDescriptorException($this, $value);
        }

        $filteredData = [];
        foreach ($value as $singleElement) {
            if (false === $this->expression->evaluate($this->evaluator, $singleElement)) {
                continue;
            }
            $filteredData[] = $singleElement;
        }
        return $filteredData;
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['filter', [$this->expression->serialize($serializer), parent::serialize($serializer)]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serialized)
    {
        list ($serializedExpression, $parentData) = $serialized;
        $this->expression = $serializer->unserializeExpression($serializedExpression);
        
        return parent::unserialize($serializer, $parentData);
    }
}