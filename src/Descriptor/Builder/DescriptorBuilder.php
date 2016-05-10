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
use Vain\Expression\ExpressionInterface;

class DescriptorBuilder
{

    private $type;

    private $module;

    private $value;

    private $mode;

    private $chain = [];

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
     * @param array $arguments
     *
     * @return DescriptorBuilder
     */
    public function method($method, array $arguments = [])
    {
        $this->chain[] = ['method', [$method, $arguments]];

        return $this;
    }

    /**
     * @param string $module
     *
     * @return DescriptorBuilder
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
     * @return DescriptorBuilder
     */
    public function property($property)
    {
        $this->chain[] = ['property', $property];

        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return DescriptorBuilder
     */
    public function func($name, array $arguments = [])
    {
        $this->chain[] = ['function', [$name, $arguments]];

        return $this;
    }

    /**
     * @param ExpressionInterface $expression
     *
     * @return DescriptorBuilder
     */
    public function filter(ExpressionInterface $expression)
    {
        $this->chain[] = ['filter', $expression];

        return $this;
    }

    /**
     * @param string $class
     * @param string $method
     * @param array $arguments
     * 
     * @return DescriptorBuilder
     */
    public function helper($class, $method, array $arguments = [])
    {
        $this->chain[] = ['helper', [$class, $method, $arguments]];

        return $this;
    }

    /**
     * @return DescriptorBuilder
     */
    public function local()
    {
        $this->type = 'local';

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
            case 'local':
                $descriptor = $this->descriptorFactory->local();
                break;
            default:
                $descriptor = $this->descriptorFactory->module($this->module);
        }

        foreach ($this->chain as $element) {
            list ($type, $value) = $element;
            switch ($type) {
                case 'property':
                    $properties = explode('.', $value);
                    foreach ($properties as $property) {
                        $descriptor = $this->descriptorFactory->property($descriptor, $property);
                    }
                    break;
                case 'method':
                    list ($name, $arguments) = $value;
                    $methods = explode('.', $name);
                    foreach ($methods as $method) {
                        $descriptor = $this->descriptorFactory->method($descriptor, $method, $arguments);
                    }
                    break;
                case 'function':
                    list ($name, $arguments) = $value;
                    $descriptor = $this->descriptorFactory->func($descriptor, $name, $arguments);
                    break;
                case 'filter':
                    $descriptor = $this->descriptorFactory->filter($descriptor, $value);
                    break;
                case 'helper':
                    list ($class, $method, $arguments) = $value;
                    $descriptor =  $this->descriptorFactory->helper($descriptor, $class, $method, $arguments);
                    break;
            }
        }

        if (null !== $this->mode) {
            $descriptor = $this->descriptorFactory->mode($descriptor, $this->mode);
        }

        $this->type = $this->value = $this->module = $this->mode = null;
        $this->chain = [];

        return $descriptor;
    }
}