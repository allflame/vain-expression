<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 6:31 PM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\Descriptor\DescriptorInterface;

class UnknownMethodDescriptorException extends DescriptorException
{
    /**
     * UnknownMethodDescriptorException constructor.
     * @param DescriptorInterface $descriptor
     * @param string $method
     */
    public function __construct(DescriptorInterface $descriptor, $method)
    {
        parent::__construct($descriptor, sprintf('Method %s does not exists in data', $method), 0, null);
    }
}