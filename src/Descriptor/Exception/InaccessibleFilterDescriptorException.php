<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 11:43 AM
 */

namespace Vain\Expression\Descriptor\Exception;

use Vain\Expression\Descriptor\DescriptorInterface;

class InaccessibleFilterDescriptorException extends DescriptorException
{
    private $value;

    /**
     * InaccessibleFilterDescriptorException constructor.
     * @param DescriptorInterface $descriptor
     */
    public function __construct(DescriptorInterface $descriptor, \ArrayAccess $value)
    {
        $this->value = $value;
        parent::__construct($descriptor, sprintf('Cannot apply filter for non-traversable object'), 0, null);
    }

    /**
     * @return \ArrayAccess
     */
    public function getValue()
    {
        return $this->value;
    }
}