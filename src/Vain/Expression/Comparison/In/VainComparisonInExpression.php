<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Comparison\In;

use Vain\Expression\Comparison\AbstractVainComparisonExpression;
use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\Serializer\VainExpressionSerializerInterface;

class VainComparisonInExpression extends AbstractVainComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        return $evaluator->in($this->getWhat(), $this->getAgainst(), $this->getType());
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
        return $parser->in($this->getWhat(), $this->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return ['in', parent::serialize($serializer)];
    }
}