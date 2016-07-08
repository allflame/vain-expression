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
namespace Vain\Expression\Parser\Record\Operator\FunctionX;

use Vain\Expression\Parser\Record\Operator\AbstractOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Class FunctionOperatorParserRecord
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FunctionOperatorParserRecord extends AbstractOperatorParserRecord
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->functionX($this);
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionOperatorParserRecord $record)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function operator(RegularOperatorParserRecord $record)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function bracket(BracketOperatorParserRecord $record)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function finish()
    {
        return true;
    }
}