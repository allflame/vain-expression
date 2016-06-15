<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 11:43 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\ExpressionInterface;

class InaccessibleFilterException extends InterpretationException
{
    /**
     * InaccessibleFilterException constructor.
     * @param ExpressionInterface $expression
     * @param \ArrayAccess $context
     * @param mixed $data
     */
    public function __construct(ExpressionInterface $expression, \ArrayAccess $context, $data)
    {
        parent::__construct($expression, $context, sprintf('Cannot apply filter for non-traversable object of type %s', gettype($data)), 0, null);
    }
}