<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

use Vain\Expression\Evaluator\VainEvaluatableExpressionInterface;
use Vain\Expression\Parser\VainParseableExpressionInterface;
use Vain\Expression\Serializer\VainSerializableExpressionInterface;

interface VainExpressionInterface extends
    VainEvaluatableExpressionInterface,
    VainParseableExpressionInterface,
    VainSerializableExpressionInterface
{
}