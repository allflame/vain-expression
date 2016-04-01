<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:32 AM
 */

namespace Vain\Expression\Comparison\Equal;

use Vain\Expression\Comparison\AbstractVainComparisonExpression;
use Vain\Expression\Evaluator\VainExpressionEvaluatorInterface;
use Vain\Expression\Parser\VainExpressionParserInterface;

class VainComparisonEqualExpression extends AbstractVainComparisonExpression
{
    /**
     * @inheritDoc
     */
    public function evaluate(VainExpressionEvaluatorInterface $evaluator)
    {
        return $evaluator->eq($this->getWhat(), $this->getAgainst(), $this->getType());
    }

    /**
     * @inheritDoc
     */
    public function parse(VainExpressionParserInterface $parser)
    {
        return $parser->eq($this->getWhat(), $this->getAgainst());
    }
}