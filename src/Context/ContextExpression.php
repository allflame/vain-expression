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

namespace Vain\Expression\Context;

use Vain\Expression\ZeroAry\AbstractZeroAryExpression;

/**
 * Class ContextExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ContextExpression extends AbstractZeroAryExpression
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $context;
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return 'context';
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['context' => []];
    }
}
