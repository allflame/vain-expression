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

namespace Vain\Expression\Lexer\Module;

/**
 * Class AbstractLexerModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractLexerModule implements LexerModuleInterface
{
    private $priority;

    /**
     * AbstractLexerModule constructor.
     *
     * @param int $priority
     */
    public function __construct(int $priority)
    {
        $this->priority = $priority;
    }

    /**
     * @inheritDoc
     */
    public function getPriority() : int
    {
        return $this->priority;
    }
}