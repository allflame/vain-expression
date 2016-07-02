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
namespace Vain\Expression\Token\Visitor;

use Vain\Expression\Token\Bracket\BracketToken;
use Vain\Expression\Token\Eof\EofToken;
use Vain\Expression\Token\Name\NameToken;
use Vain\Expression\Token\Number\NumberToken;
use Vain\Expression\Token\Operator\OperatorToken;
use Vain\Expression\Token\Punctuation\PunctuationToken;
use Vain\Expression\Token\String\StringToken;

interface VisitorInterface
{
    /**
     * @param BracketToken $bracketToken
     *
     * @return mixed
     */
    public function bracket(BracketToken $bracketToken);

    /**
     * @param EofToken $eofToken
     *
     * @return mixed
     */
    public function eof(EofToken $eofToken);

    /**
     * @param NameToken $nameToken
     *
     * @return mixed
     */
    public function name(NameToken $nameToken);

    /**
     * @param NumberToken $numberToken
     *
     * @return mixed
     */
    public function number(NumberToken $numberToken);

    /**
     * @param OperatorToken $operatorToken
     *
     * @return mixed
     */
    public function operator(OperatorToken $operatorToken);

    /**
     * @param PunctuationToken $punctuationToken
     *
     * @return mixed
     */
    public function punctuation(PunctuationToken $punctuationToken);

    /**
     * @param StringToken $stringToken
     *
     * @return mixed
     */
    public function string(StringToken $stringToken);
}