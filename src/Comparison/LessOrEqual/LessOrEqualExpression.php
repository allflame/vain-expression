<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Comparison\LessOrEqual;

use Vain\Expression\Comparison\AbstractComparisonExpression;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;

class LessOrEqualExpression extends AbstractComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(EvaluatorInterface $evaluator)
    {
        return $evaluator->lte($this->getWhat(), $this->getAgainst(), $this->getType());
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        return $parser->lte($this->getWhat(), $this->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['lte', parent::serialize($serializer)];
    }
}