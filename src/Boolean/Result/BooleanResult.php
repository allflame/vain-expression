<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
declare(strict_types = 1);

namespace Vain\Expression\Boolean\Result;

use Vain\Core\Result\AbstractResult;
use Vain\Expression\Boolean\BooleanExpressionInterface;

/**
 * Class BooleanResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BooleanResult extends AbstractResult implements BooleanResultInterface
{
    private $expression;

    private $result;

    /**
     * BooleanResult constructor.
     *
     * @param bool                       $status
     * @param BooleanExpressionInterface $expression
     * @param BooleanExpressionInterface $result
     */
    public function __construct(
        bool $status,
        BooleanExpressionInterface $expression,
        BooleanExpressionInterface $result
    ) {
        $this->expression = $expression;
        $this->result = $result;
        parent::__construct($status);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->result->interpret($context);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->result->__toString();
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return [
            'boolean_result',
            array_merge(
                parent::toArray(),
                ['expression' => $this->expression->toArray(), 'result' => $this->result->toArray()]
            ),
        ];
    }
}