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
namespace Vain\Expression\Parser\Module;

use Vain\Expression\Lexer\Token\TokenInterface;
use Vain\Expression\Parser\Record\ParserRecordInterface;

/**
 * Interface ParserModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserModuleInterface
{
//    /**
//     * @param TokenInterface $token
//     * @param \SplStack      $rpl
//     * @param \SplStack      $operators
//     * @param int            $precedence
//     *
//     * @return int
//     */
//    public function rpl(TokenInterface $token, \SplStack $rpl, \SplStack $operators, $precedence);
//
//    /**
//     * @param ParserInterface        $parser
//     * @param TokenIteratorInterface $iterator
//     *
//     * @return ExpressionInterface
//     */
//    public function process(ParserInterface $parser, TokenIteratorInterface $iterator);

    /**
     * @param TokenInterface $token
     *
     * @return ParserRecordInterface
     */
    public function translate(TokenInterface $token);
}