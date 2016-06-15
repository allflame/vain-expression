<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:15 AM
 */

namespace Vain\Expression\Boolean\Binary\AndX;

use Vain\Expression\Boolean\Binary\AbstractBinaryExpression;

class AndExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()->andX($this, $this->getFirstExpression()->interpret($context), $this->getSecondExpression()->interpret($context));
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('(%s and %s)', $this->getFirstExpression()->__toString(), $this->getSecondExpression()->__toString());
    }
}