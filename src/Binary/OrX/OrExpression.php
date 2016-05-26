<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:15 AM
 */

namespace Vain\Expression\Binary\OrX;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;

class OrExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null)
    {
        $firstExpressionResult = $this->getFirstExpression()->evaluate($evaluator, $runtimeData);
        $secondExpressionResult = $this->getSecondExpression()->evaluate($evaluator, $runtimeData);

        return $firstExpressionResult->getStatus() ||  $secondExpressionResult->getStatus();
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        return $parser->orX($this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['or', parent::serialize($serializer)];
    }
}