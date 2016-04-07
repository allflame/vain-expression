<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:51 PM
 */

namespace Vain\Expression\Module\Factory\Exception;

use Vain\Expression\Module\Factory\ModuleFactoryInterface;

class UnknownModuleFactoryException extends ModuleFactoryException
{
    /**
     * UnknownSandboxModuleFactoryException constructor.
     * @param ModuleFactoryInterface $moduleFactory
     * @param string $name
     */
    public function __construct(ModuleFactoryInterface $moduleFactory, $name)
    {
        parent::__construct($moduleFactory, sprintf('Unknown module %s', $name), 0, null);
    }
}