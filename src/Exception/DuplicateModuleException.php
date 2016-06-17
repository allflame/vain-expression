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

use Vain\Expression\Compiler\CompilerInterface;
use Vain\Expression\Compiler\Module\CompilerModuleInterface;

/**
 * Class DuplicateTokenException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateModuleException extends CompilerException
{
    /**
     * DuplicateTokenException constructor.
     *
     * @param CompilerInterface       $compiler
     * @param CompilerModuleInterface $new
     * @param CompilerModuleInterface $old
     * @param string                  $token
     */
    public function __construct(
        CompilerInterface $compiler,
        CompilerModuleInterface $new,
        CompilerModuleInterface $old,
        $token
    ) {
        parent::__construct(
            $compiler,
            sprintf(
                'Trying to register module %s was already registered for the same token %s as %s',
                get_class($new),
                $token,
                get_class($old)
            ),
            0,
            null
        );
    }
}