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
namespace Vain\Expression\Boolean\Binary\OrX;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

/**
 * Class OrExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method BooleanExpressionInterface getFirstExpression
 * @method BooleanExpressionInterface getSecondExpression
 */
class OrExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    private $resultFactory;

    /**
     * OrExpression constructor.
     *
     * @param BooleanExpressionInterface    $firstExpression
     * @param BooleanExpressionInterface    $secondExpression
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(
        BooleanExpressionInterface $firstExpression,
        BooleanExpressionInterface $secondExpression,
        BooleanResultFactoryInterface $resultFactory
    ) {
        $this->resultFactory = $resultFactory;
        parent::__construct($firstExpression, $secondExpression);
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
            ->orX(
                $this,
                $this->getFirstExpression()->interpret($context),
                $this->getSecondExpression()->interpret($context)
            );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s or %s', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['or' => parent::toArray()];
    }
}