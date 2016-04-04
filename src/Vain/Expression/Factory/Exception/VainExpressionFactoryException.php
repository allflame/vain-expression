<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:12 AM
 */

namespace Vain\Expression\Factory\Exception;

use Vain\Core\Exception\VainCoreException;
use Vain\Expression\Factory\VainExpressionFactoryInterface;

class VainExpressionFactoryException extends VainCoreException
{
    private $expressionFactory;

    /**
     * VainExpressionFactoryException constructor.
     * @param VainExpressionFactoryInterface $expressionFactory
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(VainExpressionFactoryInterface $expressionFactory, $message, $code, \Exception $previous)
    {
        $this->expressionFactory = $expressionFactory;
        parent::__construct($message, $code, $previous);
    }
}