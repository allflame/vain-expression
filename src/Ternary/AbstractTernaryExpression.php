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
namespace Vain\Expression\Ternary;

use Vain\Expression\ExpressionInterface;

/**
 * Class AbstractTernaryExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractTernaryExpression implements TernaryExpressionInterface
{
    private $firstExpression;

    private $secondExpression;

    private $thirdExpression;

    /**
     * AbstractTernaryExpression constructor.
     *
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     * @param ExpressionInterface $thirdExpression
     */
    public function __construct(
        ExpressionInterface $firstExpression,
        ExpressionInterface $secondExpression,
        ExpressionInterface $thirdExpression
    ) {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
        $this->thirdExpression = $thirdExpression;
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
    public function toArray()
    {
        return [
            'firstExpression' => $this->firstExpression->toArray(),
            'secondExpression' => $this->secondExpression->toArray(),
            'thirdExpression' => $this->thirdExpression->toArray()
        ];
    }
}