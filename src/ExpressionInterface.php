<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

use Vain\Core\String\StringInterface;

interface ExpressionInterface extends StringInterface
{
    /**
     * @param \ArrayAccess|null $context
     *
     * @return mixed
     */
    public function interpret(\ArrayAccess $context = null);

    /**
     * @return array
     */
    public function toArray();
}