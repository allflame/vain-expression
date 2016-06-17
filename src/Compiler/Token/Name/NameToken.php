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
namespace Vain\Expression\Compiler\Token\Name;

use Vain\Expression\Compiler\Token\AbstractToken;
use Vain\Expression\Compiler\Token\TokenInterface;

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
    public function doTest($type, $value = null)
    {
        return 'name' === $type;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}