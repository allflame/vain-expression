<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:58 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

interface EvaluatorInterface extends VisitorInterface
{
    /**
     * @param ExpressionInterface $expression
     *
     * @return EvaluatorInterface
     */
    public function withExpression(ExpressionInterface $expression);

    /**
     * @param \ArrayAccess $context
     *
     * @return EvaluatorInterface
     */
    public function withContext(\ArrayAccess $context = null);
}