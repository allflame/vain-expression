<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:15 AM
 */

namespace Vain\Expression\Binary\AndX;

use Vain\Expression\Binary\AbstractVainBinaryExpression;
use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\Serializer\VainExpressionSerializerInterface;

class VainBinaryAndExpression extends AbstractVainBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        return $this->getFirstExpression()->evaluate($evaluator) && $this->getSecondExpression()->evaluate($evaluator);
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
        return $parser->andX($this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return ['and', parent::serialize($serializer)];
    }
}