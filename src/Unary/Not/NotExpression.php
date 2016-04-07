<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:10 AM
 */

namespace Vain\Expression\Unary\Not;

use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;

class NotExpression extends AbstractUnaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null)
    {
        return !$this->getExpression()->evaluate($evaluator, $runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
       return $parser->not($this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['not', parent::serialize($serializer)];
    }
}