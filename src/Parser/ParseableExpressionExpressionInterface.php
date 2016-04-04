<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:57 PM
 */

namespace Vain\Expression\Parser;

interface ParseableExpressionInterface
{
    /**
     * @param ExpressionParserInterface $parser
     * 
     * @return string
     */
    public function parse(ExpressionParserInterface $parser);
}