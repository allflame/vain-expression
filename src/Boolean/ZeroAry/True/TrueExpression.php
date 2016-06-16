<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:20 AM
 */
namespace Vain\Expression\Boolean\ZeroAry\True;

use Vain\Expression\Boolean\ZeroAry\AbstractZeroAryExpression;

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