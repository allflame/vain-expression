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

namespace Vain\Expression\FunctionX;

use Vain\Expression\Exception\UnknownFunctionException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\Ternary\AbstractTernaryExpression;

/**
 * Class FunctionExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FunctionExpression extends AbstractTernaryExpression
{
    /**
     * FunctionDescriptorDecorator constructor.
     *
     * @param ExpressionInterface $data
     * @param ExpressionInterface $functionName
     * @param ExpressionInterface $arguments
     */
    public function __construct(
        ExpressionInterface $data,
        ExpressionInterface $functionName,
        ExpressionInterface $arguments
    ) {
        parent::__construct($data, $functionName, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $function = $this->getSecondExpression()->interpret($context);
        if (false === function_exists($function)) {
            throw new UnknownFunctionException($this, $context, $function);
        }

        return call_user_func(
            $function,
            $this->getFirstExpression()->interpret($context),
            ...$this->getThirdExpression()->interpret($context)
        );
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        if ('' === $this->getThirdExpression()->__toString()) {
            return sprintf('%s(%s)', $this->getSecondExpression(), $this->getFirstExpression());
        }

        return sprintf(
            '%s(%s, %s)',
            $this->getSecondExpression(),
            $this->getFirstExpression(),
            $this->getThirdExpression()
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['function' => parent::toArray()];
    }
}