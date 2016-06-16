<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:15 AM
 */
namespace Vain\Expression\Boolean\Binary\OrX;

use Vain\Expression\Boolean\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;

class OrExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()
                    ->orX(
                        $this,
                        $this->getFirstExpression()->interpret($context),
                        $this->getSecondExpression()->interpret($context)
                    );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s or %s', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'or' => [
                'firstExpression' => $this->getFirstExpression()->toArray(),
                'secondExpression' => $this->getSecondExpression()->toArray()
            ]
        ];
    }
}