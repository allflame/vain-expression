<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:18 PM
 */

namespace Vain\Expression\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Interpreter\InterpreterInterface;
use Vain\Expression\ExpressionInterface;

class InterpreterException extends CoreException
{
    private $interpreter;

    private $expression;

    /**
     * ExpressionEvaluatorException constructor.
     * @param InterpreterInterface $interpreter
     * @param ExpressionInterface $expression
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(InterpreterInterface $interpreter, ExpressionInterface $expression, $message, $code, \Exception $previous = null)
    {
        $this->interpreter = $interpreter;
        $this->expression = $expression;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return InterpreterInterface
     */
    public function getInterpreter()
    {
        return $this->interpreter;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }
}