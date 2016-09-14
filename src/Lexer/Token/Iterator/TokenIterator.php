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

namespace Vain\Expression\Lexer\Token\Iterator;

/**
 * Class TokenIterator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TokenIterator implements TokenIteratorInterface
{
    private $tokens;

    /**
     * TokenIterator constructor.
     *
     * @param array $tokens
     */
    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->tokens);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->tokens);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->tokens);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return false !== current($this->tokens);
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        return reset($this->tokens);
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return implode('', $this->tokens);
    }
}