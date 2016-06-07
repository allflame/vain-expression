<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:32 AM
 */

namespace Vain\Expression\Comparison\Equal;

use Vain\Expression\Comparison\AbstractComparisonExpression;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Visitor\VisitorInterface;

class EqualExpression extends AbstractComparisonExpression
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
        return sprintf('%s = %s', $this->getWhat(), $this->getAgainst());
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['eq', parent::serialize($serializer)];
    }
}