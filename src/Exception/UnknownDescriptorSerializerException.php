<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 11:02 AM
 */

namespace Vain\Expression\Exception;

use Vain\Expression\Serializer\ExpressionSerializerInterface;

class UnknownDescriptorSerializerException extends ExpressionSerializerException
{
    /**
     * UnknownDescriptorFactoryException constructor.
     * @param ExpressionSerializerInterface $serializer
     * @param string $name
     */
    public function __construct(ExpressionSerializerInterface $serializer, $name)
    {
        parent::__construct($serializer, sprintf('Cannot unserialize descriptor by unknown shortcut %s', $name), 0, null);
    }
}