<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:26 AM
 */

namespace Vain\Expression\Decorator;

use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;
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
    public function evaluate(EvaluatorInterface $evaluator)
    {
        return $this->expression->evaluate($evaluator);
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        return $this->expression->parse($parser);
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return $this->expression->serialize($serializer);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        return $this->expression->unserialize($serializer, $serializedData);
    }
}