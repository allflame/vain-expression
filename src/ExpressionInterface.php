<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

use Vain\Expression\Evaluator\EvaluatableExpressionInterface;
use Vain\Expression\Parser\ParseableExpressionInterface;
use Vain\Expression\Serializer\SerializableExpressionInterface;

interface ExpressionInterface extends
    EvaluatableExpressionInterface,
    ParseableExpressionInterface,
    SerializableExpressionInterface
{
}