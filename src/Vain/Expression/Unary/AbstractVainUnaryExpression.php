<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 1:01 PM
 */

namespace Vain\Expression\Unary;

use Vain\Expression\VainExpressionInterface;

abstract class AbstractVainUnaryExpression implements VainUnaryExpressionInterface
{
    private $expression;
    
    public function __construct(VainExpressionInterface $expression)
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
}