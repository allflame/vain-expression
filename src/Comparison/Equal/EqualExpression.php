<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:32 AM
 */

namespace Vain\Expression\Comparison\Equal;

use Vain\Expression\Comparison\AbstractComparisonExpression;
use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\Parser\ExpressionParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class EqualExpression extends AbstractComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator)
    {
        return $evaluator->eq($this->getWhat(), $this->getAgainst(), $this->getType());
    }

    /**
     * @inheritDoc
     */
    public function parse(ExpressionParserInterface $parser)
    {
        return $parser->eq($this->getWhat(), $this->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['eq', parent::serialize($serializer)];
    }
}