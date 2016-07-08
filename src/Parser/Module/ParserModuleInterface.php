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
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Parser\Record\ParserRecordInterface;
use Vain\Expression\Stack\ExpressionStack;

/**
 * Interface ParserModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserModuleInterface
{
    /**
     * @param ParserInterface $parser
     * @param TokenInterface  $token
     * @param ExpressionStack $stack
     *
     * @return ParserModuleInterface
     */
    public function process(ParserInterface $parser, TokenInterface $token, ExpressionStack $stack);

    /**
     * @param TokenInterface $token
     *
     * @return ParserRecordInterface
     */
    public function translate(TokenInterface $token);
}