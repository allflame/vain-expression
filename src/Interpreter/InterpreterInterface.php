<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:01 AM
 */

namespace Vain\Expression\Interpreter;

use Vain\Expression\Visitor\VisitorInterface;

interface InterpreterInterface extends VisitorInterface
{
    /**
     * @param \ArrayAccess $context
     *
     * @return InterpreterInterface
     */
    public function withContext(\ArrayAccess $context = null);
}