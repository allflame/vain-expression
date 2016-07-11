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

namespace Vain\Expression\Boolean\Module;

use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;
use Vain\Expression\Parser\Translate\AbstractParserTranslateModule;

/**
 * Class BooleanTranslateModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BooleanTranslateModule extends AbstractParserTranslateModule
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
    public function string(StringToken $token)
    {
        return null;
    }
}