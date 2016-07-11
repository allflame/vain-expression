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
namespace Vain\Expression\Parser\Algorithm;

use Vain\Expression\Parser\Record\Queue\ParserRecordQueue;

/**
 * Interface ParserAlgorithmInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserAlgorithmInterface
{
    /**
     * @param ParserRecordQueue $recordQueue
     *
     * @return ParserRecordQueue
     */
    public function parse(ParserRecordQueue $recordQueue);
}