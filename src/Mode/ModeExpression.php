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
namespace Vain\Expression\Mode;

use Vain\Expression\Binary\AbstractBinaryExpression;
use Vain\Expression\Exception\UnknownModeException;
use Vain\Expression\ExpressionInterface;

/**
 * Class ModeExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ModeExpression extends AbstractBinaryExpression
{
    /**
     * ModeDescriptorDecorator constructor.
     *
     * @param ExpressionInterface $data
     * @param ExpressionInterface $mode
     */
    public function __construct(ExpressionInterface $data, ExpressionInterface $mode)
    {
        parent::__construct($data, $mode);
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        $value = $this->getFirstExpression()->interpret($context);
        $mode = $this->getSecondExpression()->interpret($context);
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
        $value = $this->getFirstExpression()->__toString();
        switch ($this->getSecondExpression()->__toString()) {
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
        return ['mode' => parent::toArray()];
    }
}