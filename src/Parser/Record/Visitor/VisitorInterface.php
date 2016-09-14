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

namespace Vain\Expression\Parser\Record\Visitor;

use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;

/**
 * Interface VisitorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VisitorInterface
{
    /**
     * @param BracketOperatorParserRecord $bracketRecord
     *
     * @return mixed
     */
    public function bracketX(BracketOperatorParserRecord $bracketRecord);

    /**
     * @param FunctionOperatorParserRecord $functionRecord
     *
     * @return mixed
     */
    public function functionX(FunctionOperatorParserRecord $functionRecord);

    /**
     * @param RegularOperatorParserRecord $operatorRecord
     *
     * @return mixed
     */
    public function operator(RegularOperatorParserRecord $operatorRecord);

    /**
     * @param TerminalParserRecord $terminalRecord
     *
     * @return mixed
     */
    public function terminal(TerminalParserRecord $terminalRecord);
}