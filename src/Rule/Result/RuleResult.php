<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/10/16
 * Time: 9:41 AM
 */

namespace Vain\Expression\Rule\Result;

use Vain\Expression\Result\ExpressionResultInterface;
use Vain\Expression\Rule\RuleInterface;
use Vain\Expression\Visitor\VisitorInterface;

class RuleResult implements ExpressionResultInterface
{
    private $rule;

    private $result;

    /**
     * RuleResult constructor.
     * @param RuleInterface $rule
     * @param ExpressionResultInterface $expressionResult
     */
    public function __construct(RuleInterface $rule, ExpressionResultInterface $expressionResult)
    {
        $this->rule = $rule;
        $this->result = $expressionResult;
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
        $this->result = $copy->result->invert();

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
        return $this->result->accept($visitor);
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode(['rule' => serialize($this->rule), 'result' => serialize($this->result)]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->rule = unserialize($serializedData->rule);
        $this->result = unserialize($serializedData->result);

        return $this;
    }
}