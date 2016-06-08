<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 10:16 AM
 */

namespace Vain\Expression\Unary\Mode;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Serializer\SerializerInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;
use Vain\Expression\Visitor\VisitorInterface;

class ModeExpression extends AbstractUnaryExpression
{
    private $mode;

    /**
     * ModeDescriptorDecorator constructor.
     * @param ExpressionInterface $expression
     * @param string $mode
     */
    public function __construct(ExpressionInterface $expression, $mode)
    {
        $this->mode = $mode;
        parent::__construct($expression);
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

//    /**
//     * @inheritDoc
//     */
//    public function getValue(\ArrayAccess $runtimeData = null)
//    {
//        $value = parent::getValue($runtimeData);
//
//        switch ($this->mode) {
//            case 'int':
//                return (int)$value;
//                break;
//            case 'string':
//                return (string)$value;
//                break;
//            case 'float':
//            case 'double':
//                return (float)$value;
//                break;
//            case 'bool':
//            case 'boolean':
//                return (bool)$value;
//                break;
//            default:
//                return $value;
//        }
//    }



    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $value = parent::__toString();
        switch ($this->mode) {
            case 'string':
                return sprintf('"%s"', $value);
                break;
            case 'float':
            case 'double':
                return (float)$value;
                break;
            case 'bool':
            case 'boolean':
                return ($value) ? 'true' : 'false';
                break;
            case 'time':
                return $value->format(DATE_W3C);
                break;
            default:
                return (string)$value;
        }
    }

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->mode($this);
    }

//    /**
//     * @inheritDoc
//     */
//    public function serialize(SerializerInterface $serializer)
//    {
//        return ['mode', [$this->mode, parent::serialize($serializer)]];
//    }

    /**
     * @inheritDoc
     */
    public function unserialize(SerializerInterface $serializer, array $serialized)
    {
        list ($this->mode, $parentData) = $serialized;

        return parent::unserialize($serializer, $parentData);
    }
}