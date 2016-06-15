<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 10:57 AM
 */

namespace Vain\Expression\NonTerminal\Filter;

use Vain\Expression\Boolean\BooleanExpressionInterface;
use Vain\Expression\Exception\InaccessibleFilterException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class FilterExpression implements NonTerminalExpressionInterface
{

    private $data;

    private $filter;

    /**
     * FilterDescriptorDecorator constructor.
     * @param ExpressionInterface $data
     * @param BooleanExpressionInterface $filter
     */
    public function __construct(ExpressionInterface $data, BooleanExpressionInterface $filter)
    {
        $this->data = $data;
        $this->filter = $filter;
    }

    /**
     * @return ExpressionInterface
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return BooleanExpressionInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $data = $this->data->interpret($context);

        if (false === is_array($data) && false === $data instanceof \Traversable) {
            throw new InaccessibleFilterException($this, $context, $data);
        }

        $filteredData = [];
        foreach ($data as $singleElement) {
            if (false === $this->filter->interpret($singleElement)->getStatus()) {
                continue;
            }
            $filteredData[] = $singleElement;
        }

        return $filteredData;

    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s where %s', $this->data, $this->filter);
    }
}