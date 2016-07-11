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

use Vain\Core\String\StringInterface;
use Vain\Expression\Parser\Record\ParserRecordInterface;

/**
 * Class ParserRecordQueue
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ParserRecordInterface current
 * @method ParserRecordInterface top
 * @method ParserRecordInterface bottom
 * @method ParserRecordInterface dequeue
 */
class ParserRecordQueue extends \SplQueue implements StringInterface
{
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $this->rewind();
        $string = '';
        while ($this->valid()) {
            $current = $this->current();
            $string .= $current->getToken()->getValue();
            $this->next();
        }
        $this->rewind();

        return $string;
    }
}