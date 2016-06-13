<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 11:43 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Interpreter\InterpreterInterface;

class InaccessibleFilterException extends InterpreterException
{
    private $value;

    /**
     * InaccessibleFilterException constructor.
     * @param InterpreterInterface $interpreter
     * @param ExpressionInterface $expression
     * @param string $value
     */
    public function __construct(InterpreterInterface $interpreter, ExpressionInterface $expression, $value)
    {
        $this->value = $value;
        parent::__construct($interpreter, $expression, sprintf('Cannot apply filter for non-traversable object'), 0, null);
    }

    /**
     * @return object
     */
    public function getValue()
    {
        return $this->value;
    }
}