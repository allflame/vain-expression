<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/10/16
 * Time: 10:36 AM
 */

namespace Vain\Expression\ZeroAry;


abstract class AbstractZeroAryExpression implements ZeroAryExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode([]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        return $this;
    }
}