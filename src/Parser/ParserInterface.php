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
declare(strict_types = 1);

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
     * @param TokenIteratorInterface $iterator
     *
     * @return ExpressionInterface
     */
    public function parse(TokenIteratorInterface $iterator) : ExpressionInterface;
}
