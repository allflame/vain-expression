<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:08 AM
 */

namespace Vain\Expression\Unary\Identity;

use Vain\Expression\Evaluator\EvaluatorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;

class IdentityExpression extends AbstractUnaryExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(EvaluatorInterface $evaluator, \ArrayAccess $runtimeData = null)
    {
        return $this->getExpression()->evaluate($evaluator, $runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function parse(ParserInterface $parser)
    {
        return $parser->id($this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['id', parent::serialize($serializer)];
    }
}