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

namespace Vain\Expression\Parser\Algorithm\Dijkstra\Engine;

use Vain\Expression\Parser\Record\Operator\OperatorParserRecordInterface;
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Interface DijkstraEngineInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DijkstraEngineInterface extends VisitorInterface
{
    /**
     * @param OperatorParserRecordInterface $record
     *
     * @return DijkstraEngineInterface
     */
    public function withRecord(OperatorParserRecordInterface $record);
}