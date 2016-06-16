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
namespace Vain\Expression\Boolean\Binary\AndX;

use Vain\Expression\Boolean\Binary\AbstractBinaryExpression;

/**
 * Class AndExpression
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AndExpression extends AbstractBinaryExpression
{
    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        return $this->getResultFactory()
                    ->andX(
                        $this,
                        $this->getFirstExpression()->interpret($context),
                        $this->getSecondExpression()->interpret($context)
                    );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf('%s and %s', $this->getFirstExpression(), $this->getSecondExpression());
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'and' => [
                'firstExpression' => $this->getFirstExpression()->toArray(),
                'secondExpression' => $this->getSecondExpression()->toArray()
            ]
        ];
    }
}