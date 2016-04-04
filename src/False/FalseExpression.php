<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:16 AM
 */

namespace Vain\Expression\False;

use Vain\Data\Runtime\RuntimeData;
use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\ExpressionParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class FalseExpression implements ExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator, RuntimeData $runtimeData = null)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function parse(ExpressionParserInterface $parser)
    {
        return $parser->false();
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['false', []];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serializedData)
    {
        return $this;
    }
}