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
    public function getFirstExpression() : ExpressionInterface
    {
        return $this->firstExpression;
    }

    /**
     * @inheritDoc
     */
    public function getSecondExpression() : ExpressionInterface
    {
        return $this->secondExpression;
    }

    /**
     * @inheritDoc
     */
    public function getThirdExpression() : ExpressionInterface
    {
        return $this->thirdExpression;
    }

    /**
     * @inheritDoc
     */
    public function getFourthExpression() : ExpressionInterface
    {
        return $this->fourthExpression;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return [
            'firstExpression'  => $this->firstExpression->toArray(),
            'secondExpression' => $this->secondExpression->toArray(),
            'thirdExpression'  => $this->thirdExpression->toArray(),
            'fourthExpression' => $this->fourthExpression->toArray(),
        ];
    }
}