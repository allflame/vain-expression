<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:16 AM
 */

namespace Vain\Expression\False;

use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;

class FalseExpression implements ExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        return $parser->false();
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['false', []];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        return $this;
    }
}