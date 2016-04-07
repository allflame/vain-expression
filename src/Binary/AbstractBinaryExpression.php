<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */

namespace Vain\Expression\Binary;

use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\ExpressionInterface;

abstract class AbstractBinaryExpression implements BinaryExpressionInterface
{
    private $firstExpression;
    
    private $secondExpression;

    /**
     * AbstractBinaryExpression constructor.
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     */
    public function __construct(ExpressionInterface $firstExpression = null, ExpressionInterface $secondExpression = null)
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

    public function serialize(SerializerInterface $serializer)
    {
        return [$this->firstExpression->serialize($serializer), $this->secondExpression->serialize($serializer)];
    }

    public function unserialize(SerializerInterface $serializer, array $serializedData)
    {
        list ($firstExpressionData, $secondExpressionData) = $serializedData;
        $this->firstExpression = $serializer->unserializeExpression($firstExpressionData);
        $this->secondExpression = $serializer->unserializeExpression($secondExpressionData);

        return $this;
    }
}