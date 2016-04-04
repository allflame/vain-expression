<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:25 AM
 */

namespace Vain\Expression\Comparison;

use Vain\Expression\Serializer\VainExpressionSerializerInterface;

abstract class AbstractVainComparisonExpression implements VainComparisonExpressionInterface
{
    private $what;
    
    private $against;
    
    private $type;
    
    public function __construct($what, $against, $type)
    {
        $this->what = $what;
        $this->against = $against;
        $this->type = $type;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function serialize(VainExpressionSerializerInterface $serializer)
    {
        return [$this->what, $this->against, $this->type];
    }

    /**
     * @inheritDoc
     */
    public function unserialize(VainExpressionSerializerInterface $serializer, array $serializedData)
    {
        list ($this->what, $this->against, $this->type) = $serializedData;

        return $this;
    }


}