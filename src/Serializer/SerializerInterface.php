<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:49 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

interface SerializerInterface extends VisitorInterface
{
    /**
     * @param array $serializedData
     * 
     * @return ExpressionInterface
     */
    public function unserializeExpression(array $serializedData);
}