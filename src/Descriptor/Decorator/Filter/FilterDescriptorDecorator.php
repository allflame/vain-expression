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
use Vain\Expression\Exception\InaccessibleFilterException;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;

class FilterDescriptorDecorator extends AbstractDescriptorDecorator
{

    private $evaluator;

    private $expression;

    /**
     * FilterDescriptorDecorator constructor.
     * @param DescriptorInterface $descriptor
     * @param EvaluatorInterface $evaluator
     * @param ExpressionInterface $expression
     */
    public function __construct(DescriptorInterface $descriptor, EvaluatorInterface $evaluator, ExpressionInterface $expression)
    {
        $this->evaluator = $evaluator;
        $this->expression = $expression;
        parent::__construct($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s where %s', parent::__toString(), $this->expression->__toString());
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        $value = parent::getValue($runtimeData);

        if (false === is_array($value) && false === $value instanceof \Traversable) {
            throw new InaccessibleFilterException($this, $value);
        }

        $evaluator = $this->evaluator->withExpression($this->expression);

        $filteredData = [];
        foreach ($value as $singleElement) {
            if (false === $this->expression->accept($evaluator->withContext($singleElement))->getStatus()) {
                continue;
            }
            $filteredData[] = $singleElement;
        }

        return $filteredData;
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['filter', [$this->expression->serialize($serializer), parent::serialize($serializer)]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($serializedExpression, $parentData) = $serialized;
        $this->expression = $serializer->unserializeExpression($serializedExpression);
        
        return parent::unserialize($serializer, $parentData);
    }
}