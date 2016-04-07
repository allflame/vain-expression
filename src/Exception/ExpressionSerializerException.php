<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 11:01 AM
 */

namespace Vain\Expression\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Serializer\SerializerInterface;

class ExpressionSerializerException extends CoreException
{
    private $serializer;

    /**
     * DescriptorFactoryException constructor.
     * @param SerializerInterface $serializer
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(SerializerInterface $serializer, $message, $code, $previous = null)
    {
        $this->serializer = $serializer;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return SerializerInterface
     */
    public function getSerializer()
    {
        return $this->serializer;
    }
}