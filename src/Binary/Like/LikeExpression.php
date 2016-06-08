<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:44 AM
 */

namespace Vain\Expression\Binary\Like;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class LikeExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->like($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s like %s', $this->getFirstExpression(), $this->getSecondExpression());
    }
}