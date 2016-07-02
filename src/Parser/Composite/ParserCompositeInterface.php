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
namespace Vain\Expression\Parser\Composite;

use Vain\Expression\Parser\Module\ParserModuleInterface;
use Vain\Expression\Parser\ParserInterface;

/**
 * Interface ParserCompositeInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserCompositeInterface extends ParserInterface
{
    /**
     * @param ParserModuleInterface $module
     *
     * @return ParserCompositeInterface
     */
    public function addModule(ParserModuleInterface $module);
}