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

namespace Vain\Expression\Math\Module;

use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;
use Vain\Expression\Parser\Translate\AbstractParserTranslateModule;

/**
 * Class MathTranslateModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MathTranslateModule extends AbstractParserTranslateModule
{
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
    public function bracket(BracketToken $token)
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function number(NumberToken $token)
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function string(StringToken $token)
    {
        return null;
    }
}
