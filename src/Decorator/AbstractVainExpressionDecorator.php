<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:26 AM
 */

namespace Vain\Expression\Decorator;

use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\Serializer\VainExpressionSerializerInterface;
use Vain\Expression\VainExpressionInterface;

abstract class AbstractVainExpressionDecorator implements VainExpressionInterface
{
    private $expression;

    /**
     * AbstractVainExpressionDecorator constructor.
     * @param VainExpressionInterface $expression
     */
    public function __construct(VainExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return VainExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        return $this->expression->evaluate($evaluator);
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
        return $this->expression->parse($parser);
    }

    /**
     * @inheritDoc
     */
    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return $this->expression->serialize($serializer);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(VainExpressionSerializerInterface $serializer, array $serializedData)
    {
        return $this->expression->unserialize($serializer, $serializedData);
    }
}