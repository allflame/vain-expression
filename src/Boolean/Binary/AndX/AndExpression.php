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
namespace Vain\Expression\Boolean\Binary\AndX;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

/**
 * Class AndExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method BooleanExpressionInterface getFirstExpression
 * @method BooleanExpressionInterface getSecondExpression
 */
class AndExpression extends AbstractBinaryExpression
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
            ->andX(
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
        return sprintf('%s and %s', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'and' => [
                'firstExpression' => $this->getFirstExpression()->toArray(),
                'secondExpression' => $this->getSecondExpression()->toArray()
            ]
        ];
    }
}