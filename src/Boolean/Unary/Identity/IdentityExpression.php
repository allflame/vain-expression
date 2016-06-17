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
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\Unary\AbstractUnaryExpression;

/**
 * Class IdentityExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method BooleanExpressionInterface getExpression
 */
class IdentityExpression extends AbstractUnaryExpression implements BooleanExpressionInterface
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
    public function getResultFactory()
    {
        return $this->resultFactory;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->resultFactory
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