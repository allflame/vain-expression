<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/14/16
 * Time: 6:38 AM
 */

namespace Vain\Expression\Boolean\Result;

use Vain\Core\Result\AbstractResult;
use Vain\Expression\Boolean\BooleanExpressionInterface;

class BooleanResult extends AbstractResult implements BooleanResultInterface
{
    
    private $expression;
    
    private $result;

    /**
     * BooleanResult constructor.
     * @param bool $status
     * @param BooleanExpressionInterface $expression
     * @param BooleanExpressionInterface $result
     */
    public function __construct($status, BooleanExpressionInterface $expression, BooleanExpressionInterface $result)
    {
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
    public function __toString()
    {
        return $this->result->__toString();
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['result', ['status' => $this->getStatus(), 'expression' => $this->expression->toArray(), 'result' => $this->result->toArray()]];
    }
}