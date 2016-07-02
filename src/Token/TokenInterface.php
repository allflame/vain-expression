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
namespace Vain\Expression\Token;

use Vain\Core\String\StringInterface;
use Vain\Expression\Parser\Module\ParserModuleInterface;
use Vain\Expression\Token\Visitor\VisitorInterface;

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
     * @return string
     */
    public function getValue();

    /**
     *
     * @return int
     */
    public function getLength();
}