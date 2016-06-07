<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:08 AM
 */

namespace Vain\Expression\Unary\Identity;

use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class IdentityExpression extends AbstractUnaryExpression
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->id($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getExpression()->__toString();
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['id', parent::serialize($serializer)];
    }
}