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
namespace Vain\Expression\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Compiler\CompilerInterface;

/**
 * Class CompilerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CompilerException extends CoreException
{
    private $compiler;

    /**
     * CompilerException constructor.
     *
     * @param CompilerInterface $compiler
     * @param string            $message
     * @param int               $code
     * @param \Exception|null   $previous
     */
    public function __construct(CompilerInterface $compiler, $message, $code, \Exception $previous = null)
    {
        $this->compiler = $compiler;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CompilerInterface
     */
    public function getCompiler()
    {
        return $this->compiler;
    }
}