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
    ) {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
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
}