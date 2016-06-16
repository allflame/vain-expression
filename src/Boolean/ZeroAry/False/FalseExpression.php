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
namespace Vain\Expression\Boolean\ZeroAry\False;

use Vain\Expression\Boolean\ZeroAry\AbstractZeroAryExpression;

/**
 * Class FalseExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FalseExpression extends AbstractZeroAryExpression
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()->false($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return 'false';
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['false' => []];
    }
}