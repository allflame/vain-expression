<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:59 PM
 */

namespace Vain\Expression\Parser;

use Vain\Expression\VainExpressionInterface;

interface VainExpressionParserInterface
{
    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function eq($what, $against);

    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function neq($what, $against);

    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function gt($what, $against);

    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function gte($what, $against);

    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function lt($what, $against);

    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function lte($what, $against);

    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function in($what, $against);

    /**
     * @param mixed $what
     * @param mixed $against
     * 
     * @return string
     */
    public function like($what, $against);
    
    /**
     * @param VainExpressionInterface $expression
     * 
     * @return string
     */
    public function not(VainExpressionInterface $expression);

    /**
     * @param VainExpressionInterface $firstExpression
     * @param VainExpressionInterface $secondExpression
     * 
     * @return string
     */
    public function andX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression);

    /**
     * @param VainExpressionInterface $firstExpression
     * @param VainExpressionInterface $secondExpression
     * 
     * @return string
     */
    public function orX(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression);
}