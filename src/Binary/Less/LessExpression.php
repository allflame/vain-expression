<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Binary\Less;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class LessExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->lt($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s < %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}