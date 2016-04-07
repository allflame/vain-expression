<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:19 PM
 */

namespace Vain\Expression\Descriptor;

use Vain\Expression\Descriptor\Serializer\SerializableDescriptorInterface;

interface DescriptorInterface extends SerializableDescriptorInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @param \ArrayAccess $runtimeData
     *
     * @return mixed
     */
    public function getValue(\ArrayAccess $runtimeData = null);
}