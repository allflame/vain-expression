<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 6:27 PM
 */

namespace Vain\Expression\Descriptor\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Expression\Descriptor\DescriptorInterface;

class DescriptorException extends CoreException
{

    private $descriptor;

    /**
     * DescriptorException constructor.
     * @param DescriptorInterface $descriptor
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(DescriptorInterface $descriptor, $message, $code, \Exception $previous = null)
    {
        $this->descriptor = $descriptor;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return DescriptorInterface
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }
}