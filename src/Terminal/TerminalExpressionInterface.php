<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/15/16
 * Time: 8:32 AM
 */

namespace Vain\Expression\Terminal;

use Vain\Expression\ExpressionInterface;

interface TerminalExpressionInterface extends ExpressionInterface
{
    /**
     * @param \ArrayAccess|null $context
     *
     * @return mixed
     */
    public function interpret(\ArrayAccess $context = null);
}