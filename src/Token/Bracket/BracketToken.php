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
namespace Vain\Expression\Token\Bracket;

use Vain\Expression\Token\AbstractToken;
use Vain\Expression\Token\Visitor\VisitorInterface;

/**
 * Class BracketToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BracketToken extends AbstractToken
{
    private $open;

    /**
     * BracketToken constructor.
     *
     * @param mixed $value
     * @param int   $cursor
     * @param int   $length
     * @param bool  $open
     */
    public function __construct($value, $cursor, $length, $open)
    {
        $this->open = $open;
        parent::__construct($value, $cursor, $length);
    }

    /**
     * @return boolean
     */
    public function isOpen()
    {
        return $this->open;
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