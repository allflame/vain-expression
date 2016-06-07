<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:20 AM
 */

namespace Vain\Expression\True;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Visitor\VisitorInterface;

class TrueExpression implements ExpressionInterface
{

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->true($this);
    }


    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return 'TRUE';
    }

    /**
     * @inheritDoc
     */
    public function serialize(SerializerInterface $serializer)
    {
        return ['true', []];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        return $this;
    }
}