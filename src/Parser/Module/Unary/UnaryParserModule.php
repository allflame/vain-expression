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
namespace Vain\Expression\Parser\Module\Unary;

use Vain\Expression\ExpressionInterface;
use Vain\Expression\Parser\Module\ParserModuleInterface;
use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Token\Iterator\TokenIteratorInterface;
use Vain\Expression\Token\TokenInterface;
use Vain\Expression\Token\Visitor\VisitorInterface;

class UnaryParserModule implements ParserModuleInterface
{

    private $start;

    /**
     * UnaryParserModule constructor.
     *
     * @param VisitorInterface $start
     */
    public function __construct(VisitorInterface $start)
    {
        $this->start = $start;
    }

    /**
     * @inheritDoc
     */
    public function start(TokenInterface $token)
    {
        return $token->accept($this->start);
    }

    /**
     * @inheritDoc
     */
    public function process(ParserInterface $parser, TokenIteratorInterface $iterator)
    {
        $token = $iterator->current();

        switch ($token->getValue()) {
            
        }
    }
}