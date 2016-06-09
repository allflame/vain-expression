<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:24 PM
 */

namespace Vain\Expression\Terminal\InPlace;

use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Terminal\TerminalExpressionInterface;
use Vain\Expression\Visitor\VisitorInterface;

class InPlaceExpression implements TerminalExpressionInterface
{

    private $value;

    /**
     * InPlaceDescriptor constructor.
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->inPlace($this);
    }
    
    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($serializedValue) = $serialized;
        $this->value = unserialize($serializedValue);

        return $this;
    }
}