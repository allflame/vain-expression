<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

<<<<<<< 734a7052ab54a68457528f9d21de0615659b8e37
use Vain\Core\String\StringInterface;
=======
interface ExpressionInterface
{
>>>>>>> Merge remote-tracking branch 'github/dev' into dev

interface ExpressionInterface extends StringInterface
{
    /**
     * @param \ArrayAccess|null $context
     *
     * @return mixed
     */
    public function interpret(\ArrayAccess $context = null);
}