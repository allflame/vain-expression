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
namespace Vain\Expression\Parser\Record\Queue;

use Vain\Expression\Parser\Record\ParserRecordInterface;

/**
 * Class ParserRecordQueue
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ParserRecordInterface next
 * @method ParserRecordInterface current
 * @method ParserRecordInterface top
 * @method ParserRecordInterface bottom
 */
class ParserRecordQueue extends \SplQueue
{
}