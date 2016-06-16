<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:18 PM
 */
namespace Vain\Expression\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\ExpressionInterface;

class InterpretationException extends CoreException
{
    private $expression;

    private $context;

    /**
     * ExpressionEvaluatorException constructor.
     *
     * @param ExpressionInterface $expression
     * @param \ArrayAccess        $context
     * @param string              $message
     * @param int                 $code
     * @param \Exception          $previous
     */
    public function __construct(
        ExpressionInterface $expression,
        \ArrayAccess $context = null,
        $message,
        $code,
        \Exception $previous = null
    ) {
        $this->expression = $expression;
        $this->context = $context;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @return \ArrayAccess
     */
    public function getContext()
    {
        return $this->context;
    }
}