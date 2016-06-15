<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/10/16
 * Time: 9:48 AM
 */

namespace Vain\Expression\Rule;

use Vain\Expression\Boolean\BooleanExpressionInterface;

class Rule implements RuleInterface
{
    private $name;

    private $expression;

    /**
     * Rule constructor.
     * @param string $name
     * @param BooleanExpressionInterface $booleanExpression
     */
    public function __construct($name, BooleanExpressionInterface $booleanExpression)
    {
        $this->name = $name;
        $this->expression = $booleanExpression;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return BooleanExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->expression->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->expression;
    }
}