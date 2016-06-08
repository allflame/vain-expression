<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Binary\In;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class InExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->in($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s in %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}