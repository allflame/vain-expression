<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */

namespace Vain\Expression\Binary;

use Vain\Expression\VainExpressionInterface;

abstract class AbstractVainBinrayExpression implements VainBinaryExpressionInterface
{
    private $firstExpression;
    
    private $secondExpression;
    
    public function __construct(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
    }

    /**
     * @inheritDoc
     */
    public function getFirstExpression()
    {
        return $this->firstExpression;
    }

    /**
     * @inheritDoc
     */
    public function getSecondExpression()
    {
        return $this->secondExpression;
    }
}