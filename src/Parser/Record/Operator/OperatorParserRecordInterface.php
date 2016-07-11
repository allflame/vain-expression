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
namespace Vain\Expression\Parser\Record\Operator;

use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\ParserRecordInterface;

/**
 * Interface OperatorParserRecordInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface OperatorParserRecordInterface extends ParserRecordInterface
{
    /**
     * @param FunctionOperatorParserRecord $record
     *
     * @return bool
     */
    public function functionX(FunctionOperatorParserRecord $record);

    /**
     * @param RegularOperatorParserRecord $record
     *
     * @return bool
     */
    public function operator(RegularOperatorParserRecord $record);

    /**
     * @param BracketOperatorParserRecord $record
     *
     * @return bool
     */
    public function bracket(BracketOperatorParserRecord $record);

    /**
     * @return bool
     */
    public function finish();
}