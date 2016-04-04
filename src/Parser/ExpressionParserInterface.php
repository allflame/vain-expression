<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:59 PM
 */

namespace Vain\Expression\Parser;

use Vain\Expression\ExpressionInterface;

interface ExpressionParserInterface
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
     * @param ExpressionInterface $expression
     *
     * @return string
     */
    public function id(ExpressionInterface $expression);

    /**
     * @param ExpressionInterface $expression
     * 
     * @return string
     */
    public function not(ExpressionInterface $expression);

    /**
     * @return string
     */
    public function false();

    /**
     * @return string
     */
    public function true();

    /**
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     * 
     * @return string
     */
    public function andX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression);

    /**
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     * 
     * @return string
     */
    public function orX(ExpressionInterface $firstExpression, ExpressionInterface $secondExpression);
}