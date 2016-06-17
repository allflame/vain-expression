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
namespace Vain\Expression\Compiler;

use Vain\Expression\ExpressionInterface;

/**
 * Interface CompilerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CompilerInterface
{
    /**
     * @param string $string
     *
     * @return ExpressionInterface
     */
    public function compile($string);
}