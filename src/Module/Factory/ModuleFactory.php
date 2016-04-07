<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:47 PM
 */

namespace Vain\Expression\Module\Factory;

use Vain\Expression\Module\Factory\Exception\UnknownModuleFactoryException;
use Vain\Expression\Module\System\RuntimeDataModule;
use Vain\Expression\Module\System\TimeDataModule;

class ModuleFactory implements ModuleFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createModule($moduleName)
    {
        switch ($moduleName) {
            case 'system.time' :
                return new TimeDataModule();
                break;
            case 'system.runtime' :
                return new RuntimeDataModule();
                break;
            default:
                throw new UnknownModuleFactoryException($this, $moduleName);
                break;
        }
    }
}