<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 10:06 AM
 */

namespace Vain\Expression\NonTerminal\Module;

use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class ModuleExpression extends AbstractUnaryExpression implements NonTerminalExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->module($this);
    }
}