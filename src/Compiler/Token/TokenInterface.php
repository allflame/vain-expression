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
namespace Vain\Expression\Compiler\Token;

use Vain\Core\String\StringInterface;

/**
 * Interface TokenInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface TokenInterface extends StringInterface
{
    /**
     * @param int $type
     * @param mixed $value
     *
     * @return mixed
     */
    public function test($type, $value = null);

    /**
     *
     * @return int
     */
    public function getLength();
}