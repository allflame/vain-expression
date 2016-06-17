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

use Vain\Expression\Compiler\Module\CompilerModuleInterface;
use Vain\Expression\Exception\DuplicateModuleException;

/**
 * Class Compiler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Compiler implements CompilerCompositeInterface
{
    private $modules;

    /**
     * @inheritDoc
     */
    public function registerCompiler(CompilerModuleInterface $compilerModule)
    {
        foreach ($compilerModule->getTokens() as $token) {
            if (array_key_exists($token, $this->modules)) {
                throw new DuplicateModuleException($this, $compilerModule, $this->modules[$token], $token);
            }
            $this->modules[$token] = $compilerModule;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function compile($string)
    {
        trigger_error('Method compile is not implemented', E_USER_ERROR);
    }
}