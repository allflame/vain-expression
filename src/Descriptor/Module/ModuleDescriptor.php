<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 10:06 AM
 */

namespace Vain\Expression\Descriptor\Module;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Module\DataModuleInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class ModuleDescriptor implements DescriptorInterface
{
    private $module;

    /**
     * AbstractModuleDescriptor constructor.
     * @param DataModuleInterface $module
     */
    public function __construct(DataModuleInterface $module)
    {
        $this->module = $module;
    }

    /**
     * @return DataModuleInterface
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->module->__toString();
    }

    /**
     * @inheritDoc
     */
    public function getValue(\ArrayAccess $runtimeData = null)
    {
        return $this->module->getData($runtimeData);
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return ['module', [$this->module->__toString()]];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serialized)
    {
        return $this;
    }
}