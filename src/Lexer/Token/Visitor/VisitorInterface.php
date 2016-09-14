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

namespace Vain\Expression\Lexer\Token\Visitor;

use Vain\Expression\Lexer\Token\Bracket\BracketToken;
use Vain\Expression\Lexer\Token\Number\NumberToken;
use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Lexer\Token\Punctuation\PunctuationToken;
use Vain\Expression\Lexer\Token\String\StringToken;

/**
 * Interface VisitorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VisitorInterface
{
    /**
     * @param BracketToken $token
     *
     * @return mixed
     */
    public function bracket(BracketToken $token);

    /**
     * @param NumberToken $token
     *
     * @return mixed
     */
    public function number(NumberToken $token);

    /**
     * @param OperatorToken $token
     *
     * @return mixed
     */
    public function operator(OperatorToken $token);

    /**
     * @param PunctuationToken $token
     *
     * @return mixed
     */
    public function punctuation(PunctuationToken $token);

    /**
     * @param StringToken $token
     *
     * @return mixed
     */
    public function string(StringToken $token);
}