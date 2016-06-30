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

/**
 * Class BracketToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BracketToken extends AbstractToken
{
    /**
     * @inheritDoc
     */
    public function doTest($type, $value = null)
    {
        return 'bracket' === $type;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        trigger_error('Method __toString is not implemented', E_USER_ERROR);
    }
}