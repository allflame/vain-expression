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

use Vain\Expression\ExpressionInterface;

/**
 * Class InaccessibleFilterException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class InaccessibleFilterException extends InterpretationException
{
    /**
     * InaccessibleFilterException constructor.
     *
     * @param ExpressionInterface $expression
     * @param \ArrayAccess        $context
     * @param mixed               $data
     */
    public function __construct(ExpressionInterface $expression, \ArrayAccess $context, $data)
    {
        parent::__construct(
            $expression,
            $context,
            sprintf('Cannot apply filter for non-traversable object of type %s', gettype($data))
        );
    }
}
