<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:19 PM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\NonTerminal\Mode\ModeExpression;
use Vain\Expression\Interpreter\InterpreterInterface;

class ModeMismatchException extends InterpreterException
{
    private $mode;

    /**
     * ModeMismatchException constructor.
     * @param InterpreterInterface $interpreter
     * @param ModeExpression $expression
     * @param string $mode
     */
    public function __construct(InterpreterInterface $interpreter, ModeExpression $expression, $mode)
    {
        $this->mode = $mode;
        parent::__construct($interpreter, $expression, sprintf('Unable to compare values with different modes %s and %s', $expression->getMode(), $mode), 0, null);
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }
}