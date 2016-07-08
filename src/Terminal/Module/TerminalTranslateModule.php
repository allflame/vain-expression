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
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;
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