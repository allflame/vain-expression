<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 10:36 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Interpreter\InterpreterInterface;

class InaccessiblePropertyException extends InterpreterException
{

    private $value;

    /**
     * InaccessiblePropertyException constructor.
     * @param InterpreterInterface $interpreter
     * @param ExpressionInterface $expression
     * @param string $value
     */
    public function __construct(InterpreterInterface $interpreter, ExpressionInterface $expression, $value)
    {
        $this->value = $value;
        parent::__construct($interpreter, $expression, sprintf('Cannot get property for unsupported value type %s', gettype($value)), 0, null);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}