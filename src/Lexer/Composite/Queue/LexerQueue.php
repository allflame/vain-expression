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
namespace Vain\Expression\Lexer\Composite\Queue;

use Vain\Expression\Lexer\Module\LexerModuleInterface;

/**
 * Class LexerQueue
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method LexerModuleInterface next
 * @method LexerModuleInterface current
 * @method LexerModuleInterface top
 */
class LexerQueue extends \SplPriorityQueue
{
}