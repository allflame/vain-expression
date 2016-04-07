<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 6:29 PM
 */

namespace Vain\Expression\Descriptor\Exception;

use Vain\Expression\Descriptor\DescriptorInterface;

class UnknownPropertyDescriptorException extends DescriptorException
{
    /**
     * UnknownPropertyDescriptorException constructor.
     * @param DescriptorInterface $descriptor
     * @param string $name
     */
    public function __construct(DescriptorInterface $descriptor, $name)
    {
        parent::__construct($descriptor, sprintf('Property %s not found in data', $name), 0, null);
    }
}