<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 12:40 PM
 */

namespace Vain\Expression\Descriptor\Builder;


use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Descriptor\Factory\DescriptorFactoryInterface;

class DescriptorBuilder
{

    private $type;

    private $module;

    private $value;

    private $mode;

    private $property;

    private $method;

    private $descriptorFactory;

    /**
     * DescriptorBuilder constructor.
     * @param DescriptorFactoryInterface $descriptorFactory
     */
    public function __construct(DescriptorFactoryInterface $descriptorFactory)
    {
        $this->descriptorFactory = $descriptorFactory;
    }

    /**
     * @param string $mode
     *
     * @return DescriptorBuilder
     */
    public function mode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return DescriptorBuilder
     */
    public function int()
    {
        $this->mode = 'int';

        return $this;
    }

    /**
     * @return DescriptorBuilder
     */
    public function string()
    {
        $this->mode = 'string';

        return $this;
    }

    /**
     * @return DescriptorBuilder
     */
    public function float()
    {
        $this->mode = 'float';

        return $this;
    }

    /**
     * @return DescriptorBuilder
     */
    public function bool()
    {
        $this->mode = 'bool';

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return DescriptorBuilder
     */
    public function inplace($value)
    {
        $this->type = 'in_place';
        $this->value = $value;

        return $this;
    }

    /**
     * @param string $method
     *
     * @return DescriptorBuilder
     */
    public function method($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param string $module
     *
     * @return $this
     */
    public function module($module)
    {
        $this->type = 'module';
        $this->module = $module;

        return $this;
    }

    /**
     * @param string $property
     *
     * @return $this
     */
    public function property($property)
    {
        $this->property = $property;

        return $this;
    }

    /**
     * @return DescriptorInterface
     */
    public function getDescriptor()
    {
        switch ($this->type) {
            case 'in_place':
                $descriptor = $this->descriptorFactory->inplace($this->value);
                break;
            default:
                $descriptor = $this->descriptorFactory->module($this->module);
        }

        switch (true) {
            case $this->property:
                $descriptor = $this->descriptorFactory->property($descriptor, $this->property);
                break;
            case $this->method:
                $descriptor = $this->descriptorFactory->method($descriptor, $this->method);
                break;

        }

        if (null !== $this->mode) {
            $descriptor = $this->descriptorFactory->mode($descriptor, $this->mode);
        }

        $this->type = $this->value = $this->module = $this->property = $this->method = $this->mode = null;

        return $descriptor;
    }
}