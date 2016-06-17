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
namespace Vain\Expression\Quaternary;

use Vain\Expression\ExpressionInterface;

/**
 * Class AbstractQuaternaryExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractQuaternaryExpression implements QuaternaryExpressionInterface
{
    private $firstExpression;

    private $secondExpression;

    private $thirdExpression;

    private $fourthExpression;

    /**
     * AbstractQuaternaryExpression constructor.
     *
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     * @param ExpressionInterface $thirdExpression
     * @param ExpressionInterface $fourthExpression
     */
    public function __construct(
        ExpressionInterface $firstExpression,
        ExpressionInterface $secondExpression,
        ExpressionInterface $thirdExpression,
        ExpressionInterface $fourthExpression
    ) {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
        $this->thirdExpression = $thirdExpression;
        $this->fourthExpression = $fourthExpression;
    }

    /**
     * @inheritDoc
     */
    public function getFirstExpression()
    {
        return $this->firstExpression;
    }

    /**
     * @inheritDoc
     */
    public function getSecondExpression()
    {
        return $this->secondExpression;
    }

    /**
     * @inheritDoc
     */
    public function getThirdExpression()
    {
        return $this->thirdExpression;
    }

    /**
     * @inheritDoc
     */
    public function getFourthExpression()
    {
        return $this->fourthExpression;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'firstExpression' => $this->firstExpression->toArray(),
            'secondExpression' => $this->secondExpression->toArray(),
            'thirdExpression' => $this->thirdExpression->toArray(),
            'fourthExpression' => $this->fourthExpression->toArray()
        ];
    }
}