<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
declare(strict_types = 1);

namespace Vain\Expression;

use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\String\StringInterface;

/**
 * Interface ExpressionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ExpressionInterface extends StringInterface, ArrayInterface
{
    /**
     * @param \ArrayAccess|null $context
     *
     * @return mixed
     */
    public function interpret(\ArrayAccess $context = null);
}
