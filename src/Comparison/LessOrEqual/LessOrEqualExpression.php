<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Comparison\LessOrEqual;

use Vain\Expression\Comparison\AbstractComparisonExpression;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Visitor\VisitorInterface;

class LessOrEqualExpression extends AbstractComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->lte($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s <= %s', $this->getWhat(), $this->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['lte', parent::serialize($serializer)];
    }
}