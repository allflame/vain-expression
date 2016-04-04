<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:10 AM
 */

namespace Vain\Expression\Unary\Not;

use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;
use Vain\Expression\Serializer\VainExpressionSerializerInterface;
use Vain\Expression\Unary\AbstractVainUnaryExpression;

class VainUnaryNotExpression extends AbstractVainUnaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        return !$this->getExpression()->evaluate($evaluator);
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
       return $parser->not($this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return ['not', parent::serialize($serializer)];
    }
}