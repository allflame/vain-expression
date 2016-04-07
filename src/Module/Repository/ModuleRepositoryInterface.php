<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 12:59 PM
 */

namespace Vain\Expression\Module\Repository;

use Vain\Expression\Module\DataModuleInterface;

interface ModuleRepositoryInterface
{
    /**
     * @param string $moduleName
     *
     * @return DataModuleInterface
     */
    public function getModule($moduleName);

    /**
     * @param string $moduleName
     *
     * @return bool
     */
    public function isModuleAvailable($moduleName);
}