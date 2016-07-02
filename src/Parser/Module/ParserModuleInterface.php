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

use Vain\Expression\Parser\ParserInterface;

/**
 * Interface ParserModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserModuleInterface extends ParserInterface
{
    /**
     * @return array[]
     */
    public function getTokens();
}