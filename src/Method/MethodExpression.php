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

namespace Vain\Expression\Method;

use Vain\Expression\Exception\UnknownMethodException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Ternary\AbstractTernaryExpression;

/**
 * Class MethodExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MethodExpression extends AbstractTernaryExpression
{
    /**
     * PropertyDescriptorDecorator constructor.
     *
     * @param ExpressionInterface $data
     * @param ExpressionInterface $method
     * @param ExpressionInterface $arguments
     */
    public function __construct(ExpressionInterface $data, ExpressionInterface $method, ExpressionInterface $arguments)
    {
        parent::__construct($data, $method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $data = $this->getFirstExpression()->interpret($context);
        $method = $this->getSecondExpression()->interpret($context);
        if (false === method_exists($data, $method)) {
            throw new UnknownMethodException($this, $context, $data, $method);
        }

        return call_user_func([$data, $method], ...$this->getThirdExpression()->interpret($context));
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        if ('' === $this->getThirdExpression()->__toString()) {
            return sprintf('%s->%s()', $this->getFirstExpression(), $this->getSecondExpression());
        }

        return sprintf(
            '%s->%s(%s, %s)',
            $this->getFirstExpression(),
            $this->getSecondExpression(),
            $this->getThirdExpression()
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['method' => parent::toArray()];
    }
}
