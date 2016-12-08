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

namespace Vain\Expression\Parser\Module\Process;

use Vain\Expression\Lexer\Token\Visitor\VisitorInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Stack\ExpressionStack;

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
    public function withParser(ParserInterface $parser) : ParserProcessModuleInterface;

    /**
     * @param ExpressionStack $expressionStack
     *
     * @return ParserProcessModuleInterface
     */
    public function withStack(ExpressionStack $expressionStack) : ParserProcessModuleInterface;
}
