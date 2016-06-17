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
namespace Vain\Expression\Boolean\Module;

use Vain\Expression\Compiler\Module\CompilerModuleInterface;
use Vain\Expression\Factory\ExpressionFactoryInterface;

/**
 * Class BooleanExpressionModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BooleanExpressionModule implements CompilerModuleInterface
{
    private $expressionFactory;

    /**
     * BooleanExpressionModule constructor.
     *
     * @param ExpressionFactoryInterface $expressionFactory
     */
    public function __construct(ExpressionFactoryInterface $expressionFactory)
    {
        $this->expressionFactory = $expressionFactory;
    }

    /**
     * @inheritDoc
     */
    public function compile($string)
    {
        trigger_error('Method compile is not implemented', E_USER_ERROR);
    }

    /**
     * @inheritDoc
     */
    public function getTokens()
    {
        return ['and', 'or', 'id', 'not'];
    }
}