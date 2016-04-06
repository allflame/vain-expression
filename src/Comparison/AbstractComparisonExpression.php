<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:25 AM
 */

namespace Vain\Expression\Comparison;

use Vain\Data\Descriptor\DescriptorInterface;
use Vain\Expression\Serializer\ExpressionSerializerInterface;

abstract class AbstractComparisonExpression implements ComparisonExpressionInterface
{
    private $what;
    
    private $against;

    /**
     * AbstractComparisonExpression constructor.
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     */
    public function __construct(DescriptorInterface $what = null, DescriptorInterface $against = null)
    {
        $this->what = $what;
        $this->against = $against;
    }

    /**
     * @inheritDoc
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * @inheritDoc
     */
    public function getAgainst()
    {
        return $this->against;
    }

    /**
     * @inheritDoc
     */
    public function serialize(ExpressionSerializerInterface $serializer)
    {
        return [$this->what->serialize($serializer), $this->against->serialize($serializer)];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(ExpressionSerializerInterface $serializer, array $serializedData)
    {
        list ($whatData, $againstData) = $serializedData;
        $this->what = $serializer->unserializeDescriptor($whatData);
        $this->against = $serializer->unserializeDescriptor($againstData);

        return $this;
    }
}