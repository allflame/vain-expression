<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:18 PM
 */

namespace Vain\Expression\Evaluator\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Evaluator\ExpressionEvaluatorInterface;

class ExpressionEvaluatorException extends CoreException
{
    private $evaluator;

    /**
     * ExpressionEvaluatorException constructor.
     * @param ExpressionEvaluatorInterface $evaluator
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(ExpressionEvaluatorInterface $evaluator, $message, $code, $previous)
    {
        $this->evaluator = $evaluator;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ExpressionEvaluatorInterface
     */
    public function getEvaluator()
    {
        return $this->evaluator;
    }
}