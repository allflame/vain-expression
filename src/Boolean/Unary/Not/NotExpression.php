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

namespace Vain\Expression\Boolean\Unary\Not;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;

/**
 * Class NotExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NotExpression extends AbstractUnaryExpression implements BooleanExpressionInterface
{
    private $resultFactory;

    /**
     * IdentityExpression constructor.
     *
     * @param BooleanExpressionInterface    $expression
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanExpressionInterface $expression, BooleanResultFactoryInterface $resultFactory)
    {
        $this->resultFactory = $resultFactory;
        parent::__construct($expression);
    }

    /**
     * @return BooleanResultFactoryInterface
     */
    public function getResultFactory() : BooleanResultFactoryInterface
    {
        return $this->resultFactory;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->resultFactory
            ->not(
                $this,
                $this->getExpression()->interpret($context)->invert()
            );
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return sprintf('!%s', $this->getExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return [
            'not' => [
                'expression' => $this->getExpression()->toArray(),
            ],
        ];
    }
}
