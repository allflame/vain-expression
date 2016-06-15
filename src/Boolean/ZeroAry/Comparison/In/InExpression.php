<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:43 AM
 */

namespace Vain\Expression\Boolean\ZeroAry\Comparison\In;

use Vain\Expression\Boolean\ZeroAry\Comparison\AbstractComparisonExpression;

class InExpression extends AbstractComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()->comparison($this, $this->getComparator()->in($this->getWhat()->interpret($context), $this->getAgainst()->interpret($context)));
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s in [%s]', $this->getWhat()->__toString(), $this->getAgainst()->__toString());
    }
}