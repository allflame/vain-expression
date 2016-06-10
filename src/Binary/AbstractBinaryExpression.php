<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 9:12 AM
 */

namespace Vain\Expression\Binary;

use Vain\Expression\ExpressionInterface;

abstract class AbstractBinaryExpression implements BinaryExpressionInterface
{
    private $firstExpression;
    
    private $secondExpression;

    /**
     * AbstractBinaryExpression constructor.
     * @param ExpressionInterface $firstExpression
     * @param ExpressionInterface $secondExpression
     */
    public function __construct(ExpressionInterface $firstExpression = null, ExpressionInterface $secondExpression = null)
    {
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

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode(['firstExpression' => serialize($this->firstExpression), 'secondExpression' => serialize($this->secondExpression)]);
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