<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:16 AM
 */

namespace Vain\Expression\Boolean\ZeroAry\False;

use Vain\Expression\Boolean\ZeroAry\AbstractZeroAryExpression;

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
        return ['false', []];
    }
}