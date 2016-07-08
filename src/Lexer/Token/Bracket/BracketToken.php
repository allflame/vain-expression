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
    public function __construct($value, $cursor, $length, $left)
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
    public function isRight()
    {
        return (false === $this->left);
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->bracket($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}