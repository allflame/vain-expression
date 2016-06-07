<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:15 AM
 */

namespace Vain\Expression\Binary\OrX;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Visitor\VisitorInterface;

class OrExpression extends AbstractBinaryExpression
{

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->orX($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('(%s OR %s)', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['or', parent::serialize($serializer)];
    }
}