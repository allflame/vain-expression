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
namespace Vain\Expression\Boolean\Unary\Not;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Unary\AbstractUnaryExpression;

/**
 * Class NotExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NotExpression extends AbstractUnaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()
                    ->not(
                        $this,
                        $this->getExpression()->interpret($context)->invert()
                    );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('!%s', $this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'not' => [
                'expression' => $this->getExpression()->toArray()
            ]
        ];
    }
}