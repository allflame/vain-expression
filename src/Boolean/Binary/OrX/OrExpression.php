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

use Vain\Expression\Boolean\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;

/**
 * Class OrExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OrExpression extends AbstractBinaryExpression implements BooleanExpressionInterface
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()
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
        return [
            'or' => [
                'firstExpression' => $this->getFirstExpression()->toArray(),
                'secondExpression' => $this->getSecondExpression()->toArray()
            ]
        ];
    }
}