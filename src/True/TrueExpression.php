<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:20 AM
 */

namespace Vain\Expression\True;

use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class TrueExpression implements ExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        return $parser->true();
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['true', []];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serializedData)
    {
        return $this;
    }
}