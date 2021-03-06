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

namespace Vain\Expression\Parser\Record\Operator\Bracket;

use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Parser\Record\Operator\AbstractOperatorParserRecord;
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Class BracketOperatorParserRecord
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
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
    public function isLeft() : bool
    {
        return $this->getToken()->isLeft();
    }

    /**
     * @return bool
     */
    public function isRight() : bool
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
}
