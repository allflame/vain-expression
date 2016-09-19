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

namespace Vain\Expression\Boolean\Module;

use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;
use Vain\Expression\Exception\UnsupportedTokenException;
use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;
use Vain\Expression\Parser\Module\Process\AbstractProcessModule;

/**
 * Class BooleanProcessModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BooleanProcessModule extends AbstractProcessModule
{
    private $resultFactory;

    /**
     * BooleanProcessModule constructor.
     *
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanResultFactoryInterface $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

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
    public function number(NumberToken $token)
    {
        throw new UnsupportedTokenException($this, $token);
    }

    /**
     * @inheritDoc
     */
    public function operator(OperatorToken $token)
    {
        $second = $this->getExpressionStack()->pop();
        switch ($token->getValue()) {
            case '&&':
                $first = $this->getExpressionStack()->pop();

                return new AndExpression($first, $second, $this->resultFactory);
                break;
            case '||':
                $first = $this->getExpressionStack()->pop();

                return new OrExpression($first, $second, $this->resultFactory);
                break;
            case '!':
                return new NotExpression($second, $this->resultFactory);
                break;
            case '~':
                return new IdentityExpression($second, $this->resultFactory);
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
        $string = strtolower($token->getValue());
        switch ($string) {
            case 'true':
                return new TrueExpression($this->resultFactory);
                break;
            case 'false':
                return new FalseExpression($this->resultFactory);
                break;
            default:
                throw new UnsupportedTokenException($this, $token);
        }
    }
}