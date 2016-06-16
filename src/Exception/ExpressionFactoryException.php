<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:12 AM
 */
namespace Vain\Expression\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Factory\ExpressionFactoryInterface;

class ExpressionFactoryException extends CoreException
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