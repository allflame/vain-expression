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

/**
 * Interface ParserInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserInterface
{
    /**
     * @param string $string
     *
     * @return ExpressionInterface
     */
    public function parse($string);
}