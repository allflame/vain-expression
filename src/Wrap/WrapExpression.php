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

namespace Vain\Expression\Wrap;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;

/**
 * Class WrapExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class WrapExpression extends AbstractUnaryExpression
{
    /**
     * IdentityExpression constructor.
     *
     * @param ExpressionInterface $expression
     */
    public function __construct(ExpressionInterface $expression)
    {
        parent::__construct($expression);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getExpression()->interpret($context);
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return sprintf('(%s)', $this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return [
            'wrap' => [
                'expression' => $this->getExpression()->toArray(),
            ],
        ];
    }
}