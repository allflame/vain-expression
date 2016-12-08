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

namespace Vain\Expression\Terminal;

use Vain\Expression\ZeroAry\AbstractZeroAryExpression;

/**
 * Class TerminalExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TerminalExpression extends AbstractZeroAryExpression
{
    private $value;

    /**
     * TerminalExpression constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['terminal' => ['value' => json_encode($this->value)]];
    }
}
