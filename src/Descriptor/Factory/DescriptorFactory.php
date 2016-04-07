<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 10:52 AM
 */

namespace Vain\Expression\Descriptor\Factory;

use Vain\Expression\Descriptor\Decorator\FunctionX\FunctionDescriptorDecorator;
use Vain\Expression\Descriptor\Decorator\Mode\ModeDescriptorDecorator;
use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Descriptor\InPlace\InPlaceDescriptor;
use Vain\Expression\Descriptor\Decorator\Method\MethodDescriptorDecorator;
use Vain\Expression\Descriptor\Decorator\Property\PropertyDescriptorDecorator;
use Vain\Expression\Descriptor\Module\ModuleDescriptor;
use Vain\Expression\Module\Repository\ModuleRepositoryInterface;

class DescriptorFactory implements DescriptorFactoryInterface
{
    private $moduleRepository;

    /**
     * DescriptorFactory constructor.
     * @param ModuleRepositoryInterface $moduleRepository
     */
    public function __construct(ModuleRepositoryInterface $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * @inheritDoc
     */
    public function inplace($value = null)
    {
        return new InPlaceDescriptor($value);
    }

    /**
     * @inheritDoc
     */
    public function module($module)
    {
        return new ModuleDescriptor($this->moduleRepository->getModule($module));
    }

    /**
     * @inheritDoc
     */
    public function method(DescriptorInterface $descriptor, $method, array $arguments = [])
    {
        return new MethodDescriptorDecorator($descriptor, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function property(DescriptorInterface $descriptor, $property)
    {
        return new PropertyDescriptorDecorator($descriptor, $property);
    }

    /**
     * @inheritDoc
     */
    public function func(DescriptorInterface $descriptor, $functionName, array $arguments = [])
    {
        return new FunctionDescriptorDecorator($descriptor, $functionName, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function mode(DescriptorInterface $descriptor, $mode)
    {
        return new ModeDescriptorDecorator($descriptor, $mode);
    }
}