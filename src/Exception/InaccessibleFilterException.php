<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 11:43 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\Descriptor\DescriptorInterface;

class InaccessibleFilterException extends DescriptorException
{
    private $value;

    /**
     * InaccessibleFilterDescriptorException constructor.
     * @param DescriptorInterface $descriptor
     * @param object $value
     */
    public function __construct(DescriptorInterface $descriptor, $value)
    {
        $this->value = $value;
        parent::__construct($descriptor, sprintf('Cannot apply filter for non-traversable object'), 0, null);
    }

    /**
     * @return object
     */
    public function getValue()
    {
        return $this->value;
    }
}