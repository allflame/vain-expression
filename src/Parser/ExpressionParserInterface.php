<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:59 PM
 */

namespace Vain\Expression\Parser;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\ExpressionInterface;

interface ExpressionParserInterface
{
    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function eq(DescriptorInterface $what, DescriptorInterface $against);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function in(DescriptorInterface $what, DescriptorInterface $against);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * 
     * @return string
     */
    public function like(DescriptorInterface $what, DescriptorInterface $against);

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