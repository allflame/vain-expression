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

namespace Vain\Expression\Filter;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Exception\InaccessibleFilterException;
use Vain\Expression\ExpressionInterface;

/**
 * Class FilterExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FilterExpression extends AbstractBinaryExpression
{
    /**
     * FilterDescriptorDecorator constructor.
     *
     * @param ExpressionInterface        $data
     * @param BooleanExpressionInterface $filter
     */
    public function __construct(ExpressionInterface $data, BooleanExpressionInterface $filter)
    {
        parent::__construct($data, $filter);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $data = $this->getFirstExpression()->interpret($context);
        if (false === is_array($data) && false === $data instanceof \Traversable) {
            throw new InaccessibleFilterException($this, $context, $data);
        }
        $filteredData = [];
        foreach ($data as $singleElement) {
            if (false === $this->getSecondExpression()->interpret($singleElement)->getStatus()) {
                continue;
            }
            $filteredData[] = $singleElement;
        }

        return $filteredData;
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return sprintf('%s where %s', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['filter' => parent::toArray()];
    }
}