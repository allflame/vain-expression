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
namespace Vain\Expression\Boolean\Binary;

use Vain\Expression\Boolean\AbstractBooleanExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Boolean\Result\Factory\BooleanResultFactoryInterface;

/**
 * Class AbstractBinaryExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractBinaryExpression extends AbstractBooleanExpression implements BinaryExpressionInterface
{
    private $firstExpression;

    private $secondExpression;

    /**
     * AbstractBinaryExpression constructor.
     *
     * @param BooleanExpressionInterface    $firstExpression
     * @param BooleanExpressionInterface    $secondExpression
     * @param BooleanResultFactoryInterface $resultFactory
     */
    public function __construct(
        BooleanExpressionInterface $firstExpression,
        BooleanExpressionInterface $secondExpression,
        BooleanResultFactoryInterface $resultFactory
    ) {
        $this->firstExpression = $firstExpression;
        $this->secondExpression = $secondExpression;
        parent::__construct($resultFactory);
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
    public function serialize()
    {
        return json_encode(
            [
                'firstExpression' => serialize($this->firstExpression),
                'secondExpression' => serialize($this->secondExpression)
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serializedString)
    {
        $serializedData = json_decode($serializedString);
        $this->firstExpression = unserialize($serializedData->firstExpression);
        $this->secondExpression = unserialize($serializedData->secondExpression);

        return $this;
    }
}