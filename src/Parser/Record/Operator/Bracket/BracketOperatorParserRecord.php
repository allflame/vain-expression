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
namespace Vain\Expression\Parser\Record\Operator\Bracket;

use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Parser\Record\Operator\AbstractOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\FunctionX\FunctionOperatorParserRecord;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Class BracketOperatorParserRecord
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method BracketToken getToken
 */
class BracketOperatorParserRecord extends AbstractOperatorParserRecord
{
    /**
     * BracketOperatorRecord constructor.
     *
     * @param BracketToken $bracketToken
     */
    public function __construct(BracketToken $bracketToken)
    {
        parent::__construct($bracketToken);
    }

    /**
     * @return bool
     */
    public function isLeft()
    {
        return $this->getToken()->isLeft();
    }

    /**
     * @return bool
     */
    public function isRight()
    {
        return $this->getToken()->isRight();
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->bracketX($this);
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
        return true;
    }

    /**
     * @inheritDoc
     */
    public function bracket(BracketOperatorParserRecord $record)
    {
        return $this->isLeft();
    }

    /**
     * @inheritDoc
     */
    public function finish()
    {
        return false;
    }
}