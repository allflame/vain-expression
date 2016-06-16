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
namespace Vain\Expression\Boolean;

use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

/**
 * Class AbstractBooleanExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractBooleanExpression implements BooleanExpressionInterface
{
    private $resultFactory;

    /**
     * AbstractBooleanExpression constructor.
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
}