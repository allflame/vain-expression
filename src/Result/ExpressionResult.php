<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:26 AM
 */

namespace Vain\Expression\Result;

use Vain\Core\Result\AbstractResult;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class ExpressionResult extends AbstractResult implements ExpressionResultInterface
{
    private $expression;

    /**
     * ExpressionResult constructor.
     * @param boolean $status
     * @param ExpressionInterface $expression
     */
    public function __construct($status, ExpressionInterface $expression)
    {
        $this->expression = $expression;
        parent::__construct($status);
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
        return json_encode(['expression' => serialize($this->expression), 'parent' => parent::serialize()]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->expression = $serializedData->expression;

        return parent::unserialize($serializedData->parent);
    }
}