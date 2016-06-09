<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:44 AM
 */

namespace Vain\Expression\NonTerminal\NotEqual;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class NotEqualExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->neq($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s != %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}