<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 9:53 AM
 */

namespace Vain\Expression\Module\Factory;


use Vain\Expression\Module\DataModuleInterface;

interface ModuleFactoryInterface
{
    /**
     * @param string $moduleName
     * 
     * @return DataModuleInterface
     */
    public function createModule($moduleName);
}