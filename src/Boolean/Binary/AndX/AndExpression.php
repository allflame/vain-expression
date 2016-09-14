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

namespace Vain\Expression\Boolean\Binary\AndX;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

/**
 * Class AndExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AndExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    private $resultFactory;

    /**
     * AndExpression constructor.
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
            ->andX(
                $this,
                $this->getFirstExpression()->interpret($context),
                $this->getSecondExpression()->interpret($context)
            );
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return sprintf('%s and %s', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['and' => parent::toArray()];
    }
}