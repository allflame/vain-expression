<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 12:58 PM
 */

namespace Vain\Expression\Module;


interface DataModuleInterface
{

    /**
     * @return string
     */
    public function __toString();

    /**
     * @param \ArrayAccess $runtimeData
     * 
     * @return mixed
     */
    public function getData(\ArrayAccess $runtimeData = null);
}