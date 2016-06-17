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
namespace Vain\Expression\Compiler\Token\Number;

use Vain\Expression\Compiler\Token\AbstractToken;

/**
 * Class NumberToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NumberToken extends AbstractToken
{
    /**
     * @inheritDoc
     */
    public function doTest($type, $value = null)
    {
        return 'number' === $type;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}