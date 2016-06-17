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
namespace Vain\Expression\Helper;

use Vain\Expression\Exception\UnknownHelperException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Quaternary\AbstractQuaternaryExpression;

/**
 * Class HelperExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HelperExpression extends AbstractQuaternaryExpression
{
    /**
     * PropertyDescriptorDecorator constructor.
     *
     * @param ExpressionInterface $data
     * @param ExpressionInterface $class
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     */
    public function __construct(
        ExpressionInterface $data,
        ExpressionInterface $class,
        ExpressionInterface $method,
        ExpressionInterface $arguments = null
    ) {
        parent::__construct($data, $class, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $class = $this->getSecondExpression()->interpret($context);
        $method = $this->getThirdExpression()->interpret($context);
        if (false === method_exists($class, $method)) {
            throw new UnknownHelperException($this, $context, $class, $method);
        }

        return call_user_func(
            [$class, $method],
            $this->getFirstExpression()->interpret($context),
            ...$this->getFourthExpression()->interpret($context)
        );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if ('' === $this->getFourthExpression()->__toString()) {
            return sprintf(
                '%s::%s(%s)',
                $this->getSecondExpression(),
                $this->getFirstExpression(),
                $this->getThirdExpression()
            );
        }

        return sprintf(
            '%s::%s(%s, %s)',
            $this->getSecondExpression(),
            $this->getFirstExpression(),
            $this->getThirdExpression(),
            $this->getFourthExpression()
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['helper' => parent::toArray()];
    }
}