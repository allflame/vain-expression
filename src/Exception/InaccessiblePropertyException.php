<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 10:36 AM
 */

namespace Vain\Expression\Exception;


use Vain\Expression\Descriptor\DescriptorInterface;

class InaccessiblePropertyException extends DescriptorException
{

    private $value;

    /**
     * InaccessiblePropertyDescriptorException constructor.
     * @param DescriptorInterface $descriptor
     * @param mixed $value
     */
    public function __construct(DescriptorInterface $descriptor, $value)
    {
        $this->value = $value;
        parent::__construct($descriptor, sprintf('Cannot get property for unsupported value type %s', gettype($value)), 0, null);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}