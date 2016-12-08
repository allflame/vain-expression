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

namespace Vain\Expression\Boolean\ZeroAry\False;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\ZeroAry\AbstractZeroAryExpression;

/**
 * Class FalseExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FalseExpression extends AbstractZeroAryExpression implements BooleanExpressionInterface
{
    private $resultFactory;

    /**
     * FalseExpression constructor.
     *
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanResultFactoryInterface $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->resultFactory->false($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return 'false';
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['false' => []];
    }
}
