<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Comparison\LessOrEqual;

use Vain\Expression\Comparison\AbstractVainComparisonExpression;
use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\Serializer\VainExpressionSerializerInterface;

class VainComparisonLessOrEqualExpression extends AbstractVainComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        return $evaluator->lte($this->getWhat(), $this->getAgainst(), $this->getType());
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
        return $parser->lte($this->getWhat(), $this->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return ['lte', parent::serialize($serializer)];
    }
}