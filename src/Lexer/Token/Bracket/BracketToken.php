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

namespace Vain\Expression\Lexer\Token\Bracket;

use Vain\Expression\Lexer\Token\AbstractToken;
use Vain\Expression\Lexer\Token\Visitor\VisitorInterface;

/**
 * Class BracketToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BracketToken extends AbstractToken
{
    private $left;

    /**
     * BracketToken constructor.
     *
     * @param mixed $value
     * @param int   $cursor
     * @param int   $length
     * @param bool  $left
     */
    public function __construct($value, int $cursor, int $length, bool $left)
    {
        $this->left = $left;
        parent::__construct($value, $cursor, $length);
    }

    /**
     * @return boolean
     */
    public function isLeft()
    {
        return $this->left;
    }

    /**
     * @return boolean
     */
    public function isRight() : bool
    {
        return (false === $this->isLeft());
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->bracket($this);
    }
}