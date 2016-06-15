<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:26 AM
 */

namespace Vain\Expression\Decorator;

use Vain\Expression\ExpressionInterface;

abstract class AbstractExpressionDecorator implements ExpressionInterface
{
    private $expression;

    /**
     * AbstractVainExpressionDecorator constructor.
     * @param ExpressionInterface $expression
     */
    public function __construct(ExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }
}