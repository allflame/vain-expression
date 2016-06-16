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
namespace Vain\Expression\Boolean\Unary\Identity;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Unary\AbstractUnaryExpression;

/**
 * Class IdentityExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class IdentityExpression extends AbstractUnaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()
                    ->id(
                        $this,
                        $this->getExpression()->interpret($context)
                    );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getExpression();
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'id' => [
                'expression' => $this->getExpression()->toArray()
            ]
        ];
    }
}