<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:26 AM
 */

namespace Vain\Expression\Decorator;

use Vain\Data\Runtime\RuntimeData;
use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\Parser\ExpressionParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;
use Vain\Expression\ExpressionInterface;

abstract class AbstractExpressionDecorator implements ExpressionInterface
{
    private $expression;

    /**
     * AbstractVainExpressionDecorator constructor.
     * @param ExpressionInterface $expression
     */
    public function __construct(ExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @inheritDoc
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator, RuntimeData $runtimeData = null)
    {
        return $this->expression->evaluate($evaluator, $runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function parse(ExpressionParserInterface $parser)
    {
        return $this->expression->parse($parser);
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return $this->expression->serialize($serializer);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serializedData)
    {
        return $this->expression->unserialize($serializer, $serializedData);
    }
}