<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:38 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Helper\HelperExpression;

/**
 * @method HelperExpression getExpression
 */
class UnknownHelperException extends InterpretationException
{

    /**
     * UnknownHelperException constructor.
     * @param HelperExpression $helperExpression
     * @param \ArrayAccess $context
     * @param string $class
     * @param string $method
     */
    public function __construct(HelperExpression $helperExpression, \ArrayAccess $context, $class, $method)
    {
        parent::__construct($helperExpression, $context, sprintf('Helper method %s::%s is not registered', $class, $method), 0, null);
    }
}