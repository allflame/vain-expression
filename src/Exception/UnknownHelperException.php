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

namespace Vain\Expression\Exception;

use Vain\Expression\Helper\HelperExpression;

/**
 * Class UnknownHelperException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownHelperException extends InterpretationException
{
    /**
     * UnknownHelperException constructor.
     *
     * @param HelperExpression $helperExpression
     * @param \ArrayAccess     $context
     * @param string           $class
     * @param string           $method
     */
    public function __construct(
        HelperExpression $helperExpression,
        \ArrayAccess $context,
        string $class,
        string $method
    ) {
        parent::__construct(
            $helperExpression,
            $context,
            sprintf('Helper method %s::%s is not registered', $class, $method),
            0,
            null
        );
    }
}