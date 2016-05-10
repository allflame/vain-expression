<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/10/16
 * Time: 11:38 AM
 */

namespace Vain\Expression\Exception;


use Vain\Expression\Descriptor\DescriptorInterface;

class UnknownHelperException extends DescriptorException
{
    /**
     * UnknownFunctionDescriptorException constructor.
     * @param DescriptorInterface $descriptor
     * @param string $class
     * @param string $method
     */
    public function __construct(DescriptorInterface $descriptor, $class, $method)
    {
        parent::__construct($descriptor, sprintf('Helper method %s::%s is not registered', $class, $method), 0, null);
    }
}