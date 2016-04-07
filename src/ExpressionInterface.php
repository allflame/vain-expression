<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

use Vain\Expression\Evaluator\EvaluatableInterface;
use Vain\Expression\Parser\ParseableInterface;
use Vain\Expression\Serializer\SerializableInterface;

interface ExpressionInterface extends
    EvaluatableInterface,
    ParseableInterface,
    SerializableInterface
{
}