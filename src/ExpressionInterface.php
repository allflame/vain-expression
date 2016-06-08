<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

use Vain\Core\String\StringInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Visitor\VisitableInterface;

interface ExpressionInterface extends VisitableInterface, StringInterface
{
    /**
     * @param SerializerInterface $serializer
     * @param array $serializedData
     *
     * @return ExpressionInterface
     */
    public function unserialize(SerializerInterface $serializer, array $serializedData);
}