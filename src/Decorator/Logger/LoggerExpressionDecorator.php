<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 10:32 AM
 */

namespace Vain\Expression\Decorator\Logger;

use Vain\Expression\Decorator\AbstractExpressionDecorator;
use Vain\Expression\Logger\LoggerInterface;
use Vain\Expression\ExpressionInterface;

class LoggerExpressionDecorator extends AbstractExpressionDecorator
{
    private $expressionLogger;

    /**
     * VainExpressionLoggerDecorator constructor.
     * @param LoggerInterface $logger
     * @param ExpressionInterface $expression
     */
    public function __construct(LoggerInterface $logger, ExpressionInterface $expression)
    {
        $this->expressionLogger = $logger;
        parent::__construct($expression);
    }
}