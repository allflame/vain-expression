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
declare(strict_types = 1);

namespace Vain\Expression\Lexer\Token\Iterator;

use Vain\Core\String\StringInterface;
use Vain\Expression\Lexer\Token\TokenInterface;

/**
 * Interface TokenIteratorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method TokenInterface current
 * @method TokenInterface next
 */
interface TokenIteratorInterface extends \Iterator, StringInterface
{
}
