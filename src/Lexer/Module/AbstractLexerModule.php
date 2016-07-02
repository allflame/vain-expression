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
    public function __construct($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @inheritDoc
     */
    public function getPriority()
    {
        return $this->priority;
    }
}