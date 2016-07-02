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
namespace Vain\Expression\Token\Name;

use Vain\Expression\Token\AbstractToken;
use Vain\Expression\Token\TokenInterface;
use Vain\Expression\Token\Visitor\VisitorInterface;

/**
 * Class NameToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NameToken extends AbstractToken implements TokenInterface
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->name($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}