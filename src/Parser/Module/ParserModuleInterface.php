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

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Token\Iterator\TokenIteratorInterface;
use Vain\Expression\Token\TokenInterface;

/**
 * Interface ParserModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserModuleInterface
{
    /**
     * @param TokenInterface $token
     *
     * @return bool
     */
    public function start(TokenInterface $token);

    /**
     * @param ParserInterface        $parser
     * @param TokenIteratorInterface $iterator
     *
     * @return ExpressionInterface
     */
    public function process(ParserInterface $parser, TokenIteratorInterface $iterator);
}