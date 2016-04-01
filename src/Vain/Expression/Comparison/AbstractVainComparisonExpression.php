<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:25 AM
 */

namespace Vain\Expression\Comparison;

abstract class AbstractVainComparisonExpression implements VainComparisonExpressionInterface
{
    private $what;
    
    private $against;
    
    private $type;
    
    public function __construct($what, $against, $type)
    {
        $this->what = $what;
        $this->against = $against;
        $this->type = $type;
    }

    /**
     * @inheritDoc
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * @inheritDoc
     */
    public function getAgainst()
    {
        return $this->against;
    }

    /**
     * @inheritDoc
     */
    public function getType()
    {
        return $this->type;
    }
}