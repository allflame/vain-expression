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

use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Parser\Module\Init\ParserInitModuleInterface;
use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Eof\EofToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;

/**
 * Class MathInitModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MathInitModule implements ParserInitModuleInterface
{

    const OPERATORS = [
        '+' => true,
        '-' => true,
        '*' => true,
        '/' => true,
        '**' => true,
        '%' => true,
    ];

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
        return false;
    }

    /**
     * @inheritDoc
     */
    public function operator(OperatorToken $token)
    {
        return array_key_exists($token->getValue(), self::OPERATORS);
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
        return false;
    }
}