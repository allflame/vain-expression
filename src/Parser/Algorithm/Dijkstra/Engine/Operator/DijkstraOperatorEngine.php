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

namespace Vain\Expression\Parser\Algorithm\Dijkstra\Engine\Operator;


use Vain\Expression\Parser\Algorithm\Dijkstra\Engine\AbstractDijkstraEngine;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;

/**
 * Class DijkstraOperatorEngine
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method RegularOperatorParserRecord getRecord
 */
class DijkstraOperatorEngine extends AbstractDijkstraEngine
{
    /**
     * @inheritDoc
     */
    public function bracketX(BracketOperatorParserRecord $bracketRecord)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionOperatorParserRecord $functionRecord)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function operator(RegularOperatorParserRecord $operatorRecord)
    {
        return ($operatorRecord->isLeftAssociative() && ($operatorRecord->getPrecedence() <= $this->getRecord()->getPrecedence())
            || $operatorRecord->isRightAssociative() && ($operatorRecord->getPrecedence() < $this->getRecord()->getPrecedence())
        );
    }

    /**
     * @inheritDoc
     */
    public function terminal(TerminalParserRecord $terminalRecord)
    {
        return false;
    }
}