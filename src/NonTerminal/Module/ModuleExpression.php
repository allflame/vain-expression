<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 10:06 AM
 */

namespace Vain\Expression\NonTerminal\Module;

use Vain\Data\Module\Repository\ModuleRepositoryInterface;
use Vain\Expression\ExpressionInterface;
use Vain\Expression\NonTerminal\NonTerminalExpressionInterface;

class ModuleExpression implements NonTerminalExpressionInterface
{
    private $expression;

    private $moduleRepository;

    /**
     * ModuleExpression constructor.
     * @param ExpressionInterface $expression
     * @param ModuleRepositoryInterface $moduleRepository
     */
    public function __construct(ExpressionInterface $expression, ModuleRepositoryInterface $moduleRepository)
    {
        $this->expression = $expression;
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @return ModuleRepositoryInterface
     */
    public function getModuleRepository()
    {
        return $this->moduleRepository;
    }

    /**
     * @inheritDoc
     */
    public function interpret(\ArrayAccess $context = null)
    {
        // TODO: Implement interpret() method.
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->expression->__toString();
    }
}