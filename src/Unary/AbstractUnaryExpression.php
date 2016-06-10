<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:01 PM
 */

namespace Vain\Expression\Unary;

use Vain\Expression\ExpressionInterface;

abstract class AbstractUnaryExpression implements UnaryExpressionInterface
{
    private $expression;

    /**
     * AbstractUnaryExpression constructor.
     * @param ExpressionInterface|null $expression
     */
    public function __construct(ExpressionInterface $expression = null)
    {
        $this->expression = $expression;
    }

    /**
     * @inheritDoc
     */
    public function getExpression()
    {
        return $this->expression;
    }
    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode(['expression' => serialize($this->expression)]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serializedString)
    {
        $serializedData = json_decode($serializedString);
        $this->expression = unserialize($serializedData->expression);

        return $this;
    }
}