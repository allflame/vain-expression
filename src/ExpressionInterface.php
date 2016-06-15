<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

use Vain\Core\Result\ResultInterface;
use Vain\Core\String\StringInterface;

interface ExpressionInterface extends StringInterface
{
    /**
     * @param \ArrayAccess|null $context
     *
     * @return ResultInterface
     */
    public function interpret(\ArrayAccess $context = null);
}