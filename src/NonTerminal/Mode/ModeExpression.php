<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 10:16 AM
 */

namespace Vain\Expression\NonTerminal\Mode;

use Vain\Expression\Exception\UnknownModeException;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class ModeExpression implements NonTerminalExpressionInterface
{
    private $data;

    private $mode;

    /**
     * ModeDescriptorDecorator constructor.
     * @param ExpressionInterface $data
     * @param ExpressionInterface $mode
     */
    public function __construct(ExpressionInterface $data, ExpressionInterface $mode)
    {
        $this->data = $data;
        $this->mode = $mode;
    }

    /**
     * @return ExpressionInterface
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return ExpressionInterface
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $value = $this->data->interpret($context);
        $mode = $this->mode->interpret($context);

        switch ($mode) {
            case 'int':
                return (int)$value;
                break;
            case 'string':
                return (string)$value;
                break;
            case 'float':
            case 'double':
                return (float)$value;
                break;
            case 'bool':
            case 'boolean':
                return (bool)$value;
                break;
            case 'time':
            case 'datetime':
            case 'date':
            case 'object':
            case 'array':
                return $value;
            default:
                throw new UnknownModeException($this, $context, $mode);
        }
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $value = $this->data->__toString();
        switch ($this->getMode()) {
            case 'string':
                return sprintf("'%s'", $value);
                break;
            case 'float':
            case 'double':
                return (float)$value;
                break;
            case 'bool':
            case 'boolean':
                return ($value) ? 'true' : 'false';
                break;
            case 'array':
                return implode(', ', $value);
            case 'time':
            case 'datetime':
            case 'date':
                return $value->format(DATE_W3C);
                break;
            default:
                return (string)$value;
        }
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['mode' => ['data' => $this->data->toArray(), 'mode' => $this->mode->toArray()]];
    }
}