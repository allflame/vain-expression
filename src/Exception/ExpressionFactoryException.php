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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Expression\Factory\ExpressionFactoryInterface;

/**
 * Class ExpressionFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ExpressionFactoryException extends AbstractCoreException
{
    private $expressionFactory;

    /**
     * VainExpressionFactoryException constructor.
     *
     * @param ExpressionFactoryInterface $expressionFactory
     * @param string                     $message
     * @param int                        $code
     * @param \Exception                 $previous
     */
    public function __construct(
        ExpressionFactoryInterface $expressionFactory,
        $message,
        $code,
        \Exception $previous = null
    ) {
        $this->expressionFactory = $expressionFactory;
        parent::__construct($message, $code, $previous);
    }
}