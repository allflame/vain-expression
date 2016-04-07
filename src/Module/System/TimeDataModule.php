<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:46 PM
 */

namespace Vain\Expression\Module\System;


use Vain\Expression\Module\AbstractDataModule;

class TimeDataModule extends AbstractDataModule
{

    /**
     * DateTimeDataModule constructor.
     */
    public function __construct()
    {
        parent::__construct('system.time');
    }

    /**
     * @inheritDoc
     */
    public function getData(\ArrayAccess $runtimeData = null)
    {
        return new \DateTime();
    }
}