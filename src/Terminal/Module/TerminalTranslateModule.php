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

namespace Vain\Expression\Terminal\Module;

use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;
use Vain\Expression\Parser\Record\Terminal\TerminalParserRecord;
use Vain\Expression\Parser\Translate\AbstractParserTranslateModule;

/**
 * Class TerminalTranslateModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TerminalTranslateModule extends AbstractParserTranslateModule
{
    /**
     * @inheritDoc
     */
    public function operator(OperatorToken $token)
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function bracket(BracketToken $token)
    {
        return new BracketOperatorParserRecord($token);
    }

    /**
     * @inheritDoc
     */
    public function number(NumberToken $token)
    {
        return new TerminalParserRecord($token);
    }

    /**
     * @inheritDoc
     */
    public function punctuation(PunctuationToken $token)
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function string(StringToken $token)
    {
        return new TerminalParserRecord($token);
    }
}