<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 11:01 AM
 */

namespace Vain\Expression\Serializer\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

class ExpressionSerializerException extends CoreException
{
    private $serializer;

    /**
     * DescriptorFactoryException constructor.
     * @param ExpressionSerializerInterface $serializer
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(ExpressionSerializerInterface $serializer, $message, $code, $previous = null)
    {
        $this->serializer = $serializer;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ExpressionSerializerInterface
     */
    public function getSerializer()
    {
        return $this->serializer;
    }
}