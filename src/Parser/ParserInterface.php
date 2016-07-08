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
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Interface ParserInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserInterface extends VisitorInterface
{
    /**
     * @return ExpressionInterface
     */
    public function getExpression();
    
    /**
     * @param TokenIteratorInterface $iterator
     *
     * @return ParserInterface
     */
    public function parse(TokenIteratorInterface $iterator);
}