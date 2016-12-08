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

namespace Vain\Expression\Lexer\Token;

use Vain\Core\String\StringInterface;
use Vain\Expression\Lexer\Token\Visitor\VisitorInterface;

/**
 * Interface TokenInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface TokenInterface extends StringInterface
{
    /**
     * @param VisitorInterface $visitor
     *
     * @return mixed
     */
    public function accept(VisitorInterface $visitor);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     *
     * @return int
     */
    public function getLength() : int;
}
