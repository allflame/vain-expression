<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:20 AM
 */

namespace Vain\Expression\Unary\True;

use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\Serializer\VainExpressionSerializerInterface;
use Vain\Expression\Unary\AbstractVainUnaryExpression;

class VainUnaryTrueException extends AbstractVainUnaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
        return $parser->false($this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return ['true', parent::serialize($serializer)];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(VainExpressionSerializerInterface $serializer, array $serializedData)
    {
        list ($type, $parenData) = $serializedData;

        return parent::unserialize($serializer, $parenData);
    }
}