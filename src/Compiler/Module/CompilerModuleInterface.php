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
namespace Vain\Expression\Compiler\Module;

use Vain\Expression\Compiler\CompilerInterface;

/**
 * Interface CompilerModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CompilerModuleInterface extends CompilerInterface
{
    /**
     *
     * @return array[]
     */
    public function getTokens();
}