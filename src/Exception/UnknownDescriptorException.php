<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 11:02 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\Serializer\SerializerInterface;

class UnknownDescriptorException extends ExpressionSerializerException
{
    /**
     * UnknownDescriptorFactoryException constructor.
     * @param SerializerInterface $serializer
     * @param string $name
     */
    public function __construct(SerializerInterface $serializer, $name)
    {
        parent::__construct($serializer, sprintf('Cannot unserialize descriptor by unknown shortcut %s', $name), 0, null);
    }
}