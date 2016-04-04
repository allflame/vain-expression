<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */

namespace Vain\Expression\Binary;

use Vain\Expression\Serializer\VainExpressionSerializerInterface;
use Vain\Expression\VainExpressionInterface;

abstract class AbstractVainBinaryExpression implements VainBinaryExpressionInterface
{
    private $firstExpression;
    
    private $secondExpression;
    
    public function __construct(VainExpressionInterface $firstExpression, VainExpressionInterface $secondExpression)
    {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
    }

    /**
     * @inheritDoc
     */
    public function getFirstExpression()
    {
        return $this->firstExpression;
    }

    /**
     * @inheritDoc
     */
    public function getSecondExpression()
    {
        return $this->secondExpression;
    }

    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return [$this->firstExpression->serialize($serializer), $this->secondExpression->serialize($serializer)];
    }

    public function unserialize(VainExpressionSerializerInterface $serializer, array $serializedData)
    {
        list ($firstExpressionData, $secondExpressionData) = $serializedData;
        $this->firstExpression = $serializer->unserialize($firstExpressionData);
        $this->secondExpression = $serializer->unserialize($secondExpressionData);

        return $this;
    }
}