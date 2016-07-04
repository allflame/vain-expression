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
namespace Vain\Expression\Lexer\Token\String;

use Vain\Expression\Lexer\Token\AbstractToken;
use Vain\Expression\Lexer\Token\Visitor\VisitorInterface;

/**
 * Class StringToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class StringToken extends AbstractToken
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->string($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}