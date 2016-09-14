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

namespace Vain\Expression\Binary;

use Vain\Expression\ExpressionInterface;

/**
 * Class AbstractBinaryExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractBinaryExpression implements BinaryExpressionInterface
{
    private $firstExpression;

    private $secondExpression;

    /**
     * AbstractBinaryExpression constructor.
     *
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     */
    public function __construct(
        ExpressionInterface $firstExpression,
        ExpressionInterface $secondExpression
    )
    {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
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
    public function toArray() : array
    {
        return [
            'firstExpression'  => $this->getFirstExpression()->toArray(),
            'secondExpression' => $this->getSecondExpression()->toArray(),
        ];
    }
}