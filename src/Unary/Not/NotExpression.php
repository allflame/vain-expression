<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:10 AM
 */

namespace Vain\Expression\Unary\Not;

use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;
use Vain\Expression\Parser\ExpressionParserInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;

class NotExpression extends AbstractUnaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(ExpressionEvaluatorInterface $evaluator)
    {
        return !$this->getExpression()->evaluate($evaluator);
    }

    /**
     * @inheritDoc
     */
    public function parse(ExpressionParserInterface $parser)
    {
       return $parser->not($this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['not', parent::serialize($serializer)];
    }
}