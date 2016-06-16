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
namespace Vain\Expression\Boolean\ZeroAry\True;

use Vain\Expression\Boolean\ZeroAry\AbstractZeroAryExpression;

/**
 * Class TrueExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TrueExpression extends AbstractZeroAryExpression
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()->true($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return 'true';
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['true' => []];
    }
}