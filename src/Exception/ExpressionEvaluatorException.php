<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:18 PM
 */

namespace Vain\Expression\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Evaluator\EvaluatorInterface;

class ExpressionEvaluatorException extends CoreException
{
    private $evaluator;

    /**
     * ExpressionEvaluatorException constructor.
     * @param EvaluatorInterface $evaluator
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(EvaluatorInterface $evaluator, $message, $code, \Exception $previous = null)
    {
        $this->evaluator = $evaluator;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return EvaluatorInterface
     */
    public function getEvaluator()
    {
        return $this->evaluator;
    }
}