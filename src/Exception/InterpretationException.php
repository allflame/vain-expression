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
namespace Vain\Expression\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\ExpressionInterface;

/**
 * Class InterpretationException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
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