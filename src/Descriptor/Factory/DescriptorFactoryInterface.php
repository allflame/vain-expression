<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:53 PM
 */

namespace Vain\Expression\Descriptor\Factory;

use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\ExpressionInterface;

interface DescriptorFactoryInterface
{
    /**
     * @param mixed $value
     *
     * @return DescriptorInterface
     */
    public function inplace($value = null);

    /**
     * @param string $module
     *
     * @return DescriptorInterface
     */
    public function module($module);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $method
     * @param array $arguments
     *
     * @return DescriptorInterface
     */
    public function method(DescriptorInterface $descriptor, $method, array $arguments = []);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $property
     *
     * @return DescriptorInterface
     */
    public function property(DescriptorInterface $descriptor, $property);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $functionName
     * @param array $arguments
     *
     * @return DescriptorInterface
     */
    public function func(DescriptorInterface $descriptor, $functionName, array $arguments = []);

    /**
     * @param DescriptorInterface $descriptor
     * @param string $mode
     *
     * @return DescriptorInterface
     */
    public function mode(DescriptorInterface $descriptor, $mode);

    /**
     * @param DescriptorInterface $descriptor
     * @param ExpressionInterface $expression
     *
     * @return DescriptorInterface
     */
    public function filter(DescriptorInterface $descriptor, ExpressionInterface $expression);

    /**
     * @return DescriptorInterface
     */
    public function local();
}