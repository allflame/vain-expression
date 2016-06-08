<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:32 AM
 */

namespace Vain\Expression\Binary\Equal;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class EqualExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->eq($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s = %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}