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
namespace Vain\Expression\Token\Eof;

use Vain\Expression\Token\AbstractToken;
use Vain\Expression\Token\TokenInterface;
use Vain\Expression\Token\Visitor\VisitorInterface;

/**
 * Class EofToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EofToken extends AbstractToken implements TokenInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->eof($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}