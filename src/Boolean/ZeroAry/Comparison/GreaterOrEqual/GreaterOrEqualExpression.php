<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:42 AM
 */

namespace Vain\Expression\Boolean\ZeroAry\Comparison\GreaterOrEqual;

use Vain\Expression\Boolean\ZeroAry\Comparison\AbstractComparisonExpression;

class GreaterOrEqualExpression extends AbstractComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()->comparison($this, $this->getComparator()->gte($this->getWhat()->interpret($context), $this->getAgainst()->interpret($context)));
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s >= %s', $this->getWhat()->__toString(), $this->getAgainst()->__toString());
    }
}