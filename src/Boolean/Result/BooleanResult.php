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
    
    private $status;
    
    private $result;

    /**
     * BooleanResult constructor.
     * @param BooleanExpressionInterface $expression
     * @param $status
     * @param BooleanExpressionInterface $result
     */
    public function __construct(BooleanExpressionInterface $expression, $status, BooleanExpressionInterface $result)
    {
        $this->expression = $expression;
        $this->status = $status;
        $this->result = $result;
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
        return $this->result;
    }

}