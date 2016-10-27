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

namespace Vain\Expression\Exception;

use Vain\Expression\Factory\ExpressionFactoryInterface;

/**
 * Class UnknownExpressionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownExpressionException extends ExpressionFactoryException
{
    /**
     * UnknownExpressionException constructor.
     *
     * @param ExpressionFactoryInterface $expressionFactory
     * @param string                     $shortcut
     */
    public function __construct(
        ExpressionFactoryInterface $expressionFactory,
        string $shortcut
    ) {
        parent::__construct($expressionFactory, sprintf('Cannot create expression by unknown shortcut %s', $shortcut));
    }
}