<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:26 AM
 */

namespace Vain\Expression\Result;

use Vain\Core\Result\ResultInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class ExpressionResult implements ExpressionResultInterface
{
    private $expression;

    private $result;

    /**
     * ExpressionResult constructor.
     * @param ExpressionInterface $expression
     * @param ResultInterface $result
     */
    public function __construct(ExpressionInterface $expression, ResultInterface $result)
    {
        $this->expression = $expression;
        $this->result = $result;
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return $this->result->isSuccessful();
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->result->getStatus();
    }

    /**
     * @inheritDoc
     */
    public function invert()
    {
        $copy = clone $this;
        $copy->result = $copy->result->invert();

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->result->__toString();
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $this->expression->accept($visitor);
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode([serialize($this->expression), serialize($this->result)]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->expression = $serializedData->expression;
        $this->result = $serializedData->result;

        return $this;
    }
}