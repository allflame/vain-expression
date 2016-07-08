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
use Vain\Expression\Queue\ExpressionQueue;

/**
 * Interface ParserModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserModuleInterface
{
    /**
     * @param ParserInterface $parser
     * @param TokenInterface $token
     * @param ExpressionQueue $queue
     *
     * @return ParserModuleInterface
     */
    public function process(ParserInterface $parser, TokenInterface $token, ExpressionQueue $queue);

    /**
     * @param TokenInterface $token
     *
     * @return ParserRecordInterface
     */
    public function translate(TokenInterface $token);
}