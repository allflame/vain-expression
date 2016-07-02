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
    public function doTest($type, $value = null)
    {
        return 'eof' === $type;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}