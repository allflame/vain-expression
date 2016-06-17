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
namespace Vain\Expression\Compiler\Composite;

use Vain\Expression\Compiler\CompilerInterface;
use Vain\Expression\Compiler\Module\CompilerModuleInterface;

/**
 * Interface CompositeCompilerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CompositeCompilerInterface extends CompilerInterface
{
    /**
     * @param CompilerModuleInterface $compilerModule
     *
     * @return CompositeCompilerInterface
     */
    public function register(CompilerModuleInterface $compilerModule);
}