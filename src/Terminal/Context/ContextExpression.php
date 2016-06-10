<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 7:50 PM
 */

namespace Vain\Expression\Terminal\Context;

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