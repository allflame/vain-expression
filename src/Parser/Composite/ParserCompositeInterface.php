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

namespace Vain\Expression\Parser\Composite;

use Vain\Expression\Parser\Module\ParserModuleInterface;

/**
 * Interface ParserCompositeInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserCompositeInterface
{
    /**
     * @param ParserModuleInterface $module
     *
     * @return ParserCompositeInterface
     */
    public function addModule(ParserModuleInterface $module) : ParserCompositeInterface;
}
