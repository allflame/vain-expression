<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:15 AM
 */

namespace Vain\Expression\Binary\AndX;

use Vain\Core\Runtime\RuntimeData;
use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\Parser\ExpressionParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class AndExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator, RuntimeData $runtimeData = null)
    {
        return $this->getFirstExpression()->evaluate($evaluator, $runtimeData) && $this->getSecondExpression()->evaluate($evaluator, $runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function parse(ExpressionParserInterface $parser)
    {
        return $parser->andX($this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['and', parent::serialize($serializer)];
    }
}