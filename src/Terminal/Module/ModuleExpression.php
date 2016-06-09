<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 10:06 AM
 */

namespace Vain\Expression\Terminal\Module;

use Vain\Data\Module\DataModuleInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Terminal\TerminalExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class ModuleExpression implements TerminalExpressionInterface
{
    private $module;

    /**
     * AbstractModuleDescriptor constructor.
     * @param DataModuleInterface $module
     */
    public function __construct(DataModuleInterface $module = null)
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
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->module($this);
    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        return $this;
    }
}