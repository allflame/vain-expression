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

use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Parser\Module\Init\ParserInitModuleInterface;
use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Eof\EofToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;

/**
 * Class PrimaryInitModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TerminalInitModule implements ParserInitModuleInterface
{
    /**
     * @inheritDoc
     */
    public function bracket(BracketToken $token)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function eof(EofToken $token)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function number(NumberToken $token)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function operator(OperatorToken $token)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function punctuation(PunctuationToken $token)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function string(StringToken $token)
    {
        return true;
    }
}