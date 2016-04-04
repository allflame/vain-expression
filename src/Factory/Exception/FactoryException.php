<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:12 AM
 */

namespace Vain\Expression\Factory\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Factory\FactoryInterface;

class FactoryException extends CoreException
{
    private $expressionFactory;

    /**
     * VainExpressionFactoryException constructor.
     * @param FactoryInterface $expressionFactory
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(FactoryInterface $expressionFactory, $message, $code, \Exception $previous)
    {
        $this->expressionFactory = $expressionFactory;
        parent::__construct($message, $code, $previous);
    }
}