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
namespace Vain\Expression\Terminal\Module;

use Vain\Expression\Exception\UnsupportedTokenException;
use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Mode\ModeExpression;
use Vain\Expression\Parser\Module\Process\AbstractProcessModule;
use Vain\Expression\Terminal\TerminalExpression;
use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;

/**
 * Class PrimaryProcessModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TerminalProcessModule extends AbstractProcessModule
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
    public function number(NumberToken $token)
    {
        return new ModeExpression(new TerminalExpression($token->getValue()), new TerminalExpression('int'));
    }

    /**
     * @inheritDoc
     */
    public function operator(OperatorToken $token)
    {
        throw new UnsupportedTokenException($this, $token);
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
        return new ModeExpression(new TerminalExpression($token->getValue()), new TerminalExpression('string'));
    }
}