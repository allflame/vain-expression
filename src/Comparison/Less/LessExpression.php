<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Comparison\Less;

use Vain\Core\Runtime\RuntimeData;
use Vain\Expression\Comparison\AbstractComparisonExpression;
use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\Parser\ExpressionParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class LessExpression extends AbstractComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator, RuntimeData $runtimeData = null)
    {
        return $evaluator->lt($this->getWhat(), $this->getAgainst(), $runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function parse(ExpressionParserInterface $parser)
    {
        return $parser->lt($this->getWhat(), $this->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['lt', parent::serialize($serializer)];
    }
}