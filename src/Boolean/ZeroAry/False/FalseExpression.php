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
namespace Vain\Expression\Boolean\ZeroAry\False;

use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\ZeroAry\AbstractZeroAryExpression;

/**
 * Class FalseExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FalseExpression extends AbstractZeroAryExpression
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
    public function __toString()
    {
        return 'false';
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['false' => []];
    }
}