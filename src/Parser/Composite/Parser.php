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
namespace Vain\Expression\Parser\Composite;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\Module\ParserModuleInterface;
use Vain\Expression\Lexer\Token\Iterator\TokenIteratorInterface;

/**
 * Class Parser
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Parser implements ParserCompositeInterface
{
    /**
     * @var ParserModuleInterface[]
     */
    private $modules;

    /**
     * @var ExpressionInterface
     */
    private $expression;

    /**
     * Compiler constructor.
     *
     * @param ParserModuleInterface[] $modules
     */
    public function __construct(array $modules = [])
    {
        foreach ($modules as $module) {
            $this->addModule($module);
        }
    }

    /**
     * @inheritDoc
     */
    public function addModule(ParserModuleInterface $module)
    {
        $this->modules[] = $module;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @inheritDoc
     */
    public function parse(TokenIteratorInterface $iterator)
    {
        $token = $iterator->current();

        while ($iterator->valid()) {
            foreach ($this->modules as $module) {
                if (false === $module->start($token)) {
                    continue;
                }
                $this->expression = $module->process($this, $iterator);
            }
        }

        return $this;
    }
}