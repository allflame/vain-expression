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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Expression\ExpressionInterface;

/**
 * Class InterpretationException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class InterpretationException extends AbstractCoreException
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
        string $message,
        int $code,
        \Exception $previous = null
    ) {
        $this->expression = $expression;
        $this->context = $context;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression() : ExpressionInterface
    {
        return $this->expression;
    }

    /**
     * @return \ArrayAccess
     */
    public function getContext() : \ArrayAccess
    {
        return $this->context;
    }
}