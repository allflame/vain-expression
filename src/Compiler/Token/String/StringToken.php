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
namespace Vain\Expression\Compiler\Token\String;

use Vain\Expression\Compiler\Token\AbstractToken;

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
    public function doTest($type, $value = null)
    {
        return 'string' === $type;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}