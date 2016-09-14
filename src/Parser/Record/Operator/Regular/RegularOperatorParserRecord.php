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

namespace Vain\Expression\Parser\Record\Operator\Regular;

use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Lexer\Token\TokenInterface;
use Vain\Expression\Parser\Record\Operator\AbstractOperatorParserRecord;
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Class RegularOperatorParserRecord
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method OperatorToken getCompareToken
 */
class RegularOperatorParserRecord extends AbstractOperatorParserRecord
{
    private $precedence;

    private $associativity;

    /**
     * RegularOperatorRecord constructor.
     *
     * @param TokenInterface $token
     * @param int            $precedence
     * @param bool           $associativity
     */
    public function __construct(TokenInterface $token, int $precedence, bool $associativity = false)
    {
        $this->precedence = $precedence;
        $this->associativity = $associativity;
        parent::__construct($token);
    }

    /**
     * @return int
     */
    public function getPrecedence() : int
    {
        return $this->precedence;
    }

    /**
     * @return bool
     */
    public function isLeftAssociative() : bool
    {
        return (false === $this->associativity);
    }

    /**
     * @return bool
     */
    public function isRightAssociative() : bool
    {
        return $this->associativity;
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->operator($this);
    }
}