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

namespace Vain\Expression\Parser\Algorithm\Dijkstra\Engine;

use Vain\Expression\Parser\Record\Operator\OperatorParserRecordInterface;

/**
 * Class AbstractDijkstraEngine
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDijkstraEngine implements DijkstraEngineInterface
{
    private $record;

    /**
     * @inheritDoc
     */
    public function withRecord(OperatorParserRecordInterface $record) : DijkstraEngineInterface
    {
        $this->record = $record;

        return $this;
    }

    /**
     * @return OperatorParserRecordInterface
     */
    public function getRecord() : OperatorParserRecordInterface
    {
        return $this->record;
    }
}