<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
declare(strict_types = 1);

namespace Vain\Expression\Property;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Exception\InaccessiblePropertyException;
use Vain\Expression\Exception\UnknownPropertyException;
use Vain\Expression\ExpressionInterface;

/**
 * Class PropertyExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PropertyExpression extends AbstractBinaryExpression
{
    /**
     * PropertyDescriptorDecorator constructor.
     *
     * @param ExpressionInterface $data
     * @param ExpressionInterface $property
     */
    public function __construct(ExpressionInterface $data, ExpressionInterface $property)
    {
        parent::__construct($data, $property);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $data = $this->getFirstExpression()->interpret($context);
        $property = $this->getSecondExpression()->interpret($context);
        switch (true) {
            case is_array($data):
                if (false === array_key_exists($property, $data)) {
                    throw new UnknownPropertyException($this, $context, $data, $property);
                }

                return $data[$property];
                break;
            case $data instanceof \ArrayAccess:
                if (false === $data->offsetExists($property)) {
                    throw new UnknownPropertyException($this, $context, $data, $property);
                }

                return $data->offsetGet($property);
                break;
            case is_object($data):
                if (false === property_exists($data, $property)) {
                    throw new UnknownPropertyException($this, $context, $data, $property);
                }

                return $data->{$property};
                break;
            default:
                throw new InaccessiblePropertyException($this, $context, $data);
                break;
        }
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return sprintf('%s.%s', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['property' => parent::toArray()];
    }
}
