<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:29 PM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\Descriptor\DescriptorInterface;

class UnknownFunctionException extends DescriptorException
{
    /**
     * UnknownFunctionDescriptorException constructor.
     * @param DescriptorInterface $descriptor
     * @param string $functionName
     */
    public function __construct(DescriptorInterface $descriptor, $functionName)
    {
        parent::__construct($descriptor, sprintf('Function %s is not registered', $functionName), 0, null);
    }
}