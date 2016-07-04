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
namespace Vain\Expression\Parser;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;

/**
 * Interface ParserInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserInterface
{
    /**
     * @return mixed
     */
    public function getExpression();
    
    /**
     * @param TokenIteratorInterface $iterator
     *
     * @return ExpressionInterface
     */
    public function parse(TokenIteratorInterface $iterator);
}