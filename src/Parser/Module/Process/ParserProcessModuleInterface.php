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
namespace Vain\Expression\Parser\Module\Process;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Lexer\Token\Visitor\VisitorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;

/**
 * Interface ParserProcessModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserProcessModuleInterface extends VisitorInterface
{
    /**
     * @param ParserInterface $parser
     *
     * @return ParserProcessModuleInterface
     */
    public function withParser(ParserInterface $parser);

    /**
     * @param TokenIteratorInterface $iterator
     *
     * @return ParserProcessModuleInterface
     */
    public function withIterator(TokenIteratorInterface $iterator);

    /**
     * @return ExpressionInterface
     */
    public function process();
}