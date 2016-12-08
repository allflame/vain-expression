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

namespace Vain\Expression\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Extension\AbstractExtension;
use Vain\Expression\Extension\Compiler\ParserModuleCompilerPass;

/**
 * Class ExpressionExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ExpressionExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractExtension
    {
        $container->addCompilerPass(new ParserModuleCompilerPass());

        return parent::load($configs, $container);
    }
}
