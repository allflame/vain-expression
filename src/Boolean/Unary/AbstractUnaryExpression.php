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
namespace Vain\Expression\Boolean\Unary;

use Vain\Expression\Boolean\AbstractBooleanExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

/**
 * Class AbstractUnaryExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractUnaryExpression extends AbstractBooleanExpression implements UnaryExpressionInterface
{
    private $expression;

    /**
     * AbstractUnaryExpression constructor.
     *
     * @param BooleanExpressionInterface    $expression
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanExpressionInterface $expression, BooleanResultFactoryInterface $resultFactory)
    {
        $this->expression = $expression;
        parent::__construct($resultFactory);
    }

    /**
     * @inheritDoc
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode(['expression' => serialize($this->expression)]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serializedString)
    {
        $serializedData = json_decode($serializedString);
        $this->expression = unserialize($serializedData->expression);

        return $this;
    }
}