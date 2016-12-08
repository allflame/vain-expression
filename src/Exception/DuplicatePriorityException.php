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

namespace Vain\Expression\Exception;

use Vain\Expression\Lexer\LexerInterface;
use Vain\Expression\Lexer\Module\LexerModuleInterface;

/**
 * Class DuplicatePriorityException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicatePriorityException extends LexerException
{
    /**
     * DuplicateTokenException constructor.
     *
     * @param LexerInterface       $compiler
     * @param LexerModuleInterface $new
     * @param LexerModuleInterface $old
     */
    public function __construct(
        LexerInterface $compiler,
        LexerModuleInterface $new,
        LexerModuleInterface $old
    ) {
        parent::__construct(
            $compiler,
            sprintf(
                'Trying to register lexer module %s with the same priority %d as already registered %s',
                get_class($new),
                $new->getPriority(),
                get_class($old)
            )
        );
    }
}
