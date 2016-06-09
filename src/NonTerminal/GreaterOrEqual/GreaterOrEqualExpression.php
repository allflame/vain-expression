<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:42 AM
 */

namespace Vain\Expression\NonTerminal\GreaterOrEqual;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class GreaterOrEqualExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->gte($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s >= %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}