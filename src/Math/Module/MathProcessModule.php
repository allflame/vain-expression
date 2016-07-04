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
namespace Vain\Expression\Math\Module;

use Vain\Expression\Exception\UnsupportedTokenException;
use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Math\Divide\DivideExpression;
use Vain\Expression\Math\Fraction\FractionExpression;
use Vain\Expression\Math\Minus\MinusExpression;
use Vain\Expression\Math\Multiply\MultiplyExpression;
use Vain\Expression\Math\Plus\PlusExpression;
use Vain\Expression\Math\Pow\PowExpression;
use Vain\Expression\Parser\Module\Process\AbstractProcessModule;
use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Eof\EofToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;

/**
 * Class MathProcessModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MathProcessModule extends AbstractProcessModule
{
    /**
     * @inheritDoc
     */
    public function bracket(BracketToken $token)
    {
        throw new UnsupportedTokenException($this, $token);
    }

    /**
     * @inheritDoc
     */
    public function eof(EofToken $token)
    {
        throw new UnsupportedTokenException($this, $token);
    }

    /**
     * @inheritDoc
     */
    public function number(NumberToken $token)
    {
        throw new UnsupportedTokenException($this, $token);
    }

    /**
     * @inheritDoc
     */
    public function operator(OperatorToken $token)
    {
        $left = $this->getParser()->getExpression();
        
        switch ($token->getValue()) {
            case '+':
                $this->getIterator()->next();
                return new PlusExpression($left, $this->getParser()->parse($this->getIterator()));
                break;
            case '-':
                $this->getIterator()->next();
                return new MinusExpression($left, $this->getParser()->parse($this->getIterator()));
                break;
            case '*':
                $this->getIterator()->next();
                return new MultiplyExpression($left, $this->getParser()->parse($this->getIterator()));
                break;
            case '/':
                $this->getIterator()->next();
                return new DivideExpression($left, $this->getParser()->parse($this->getIterator()));
                break;
            case '**':
                $this->getIterator()->next();
                return new PowExpression($left, $this->getParser()->parse($this->getIterator()));
                break;
            case '%':
                $this->getIterator()->next();
                return new FractionExpression($left, $this->getParser()->parse($this->getIterator()));
                break;
            default:
                throw new UnsupportedTokenException($this, $token);
        }
    }

    /**
     * @inheritDoc
     */
    public function punctuation(PunctuationToken $token)
    {
        throw new UnsupportedTokenException($this, $token);
    }

    /**
     * @inheritDoc
     */
    public function string(StringToken $token)
    {
        throw new UnsupportedTokenException($this, $token);
    }
}