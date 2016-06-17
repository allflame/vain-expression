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
namespace Vain\Expression\Boolean\ZeroAry\True;

use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;
use Vain\Expression\ZeroAry\AbstractZeroAryExpression;

/**
 * Class TrueExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TrueExpression extends AbstractZeroAryExpression
{
    private $resultFactory;

    /**
     * TrueExpression constructor.
     *
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(BooleanResultFactoryInterface $resultFactory)
    {
        $this->resultFactory = $resultFactory;
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
        return $this->resultFactory->true($this);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return 'true';
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['true' => []];
    }
}