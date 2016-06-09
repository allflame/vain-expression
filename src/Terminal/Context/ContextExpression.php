<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 7:50 PM
 */

namespace Vain\Expression\Terminal\Context;

use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Terminal\TerminalExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class ContextExpression implements TerminalExpressionInterface
{

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->context($this);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        return $this;
    }
}