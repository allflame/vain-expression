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

namespace Vain\Expression\Lexer\Token\Operator;

use Vain\Expression\Lexer\Token\AbstractToken;
use Vain\Expression\Lexer\Token\Visitor\VisitorInterface;

/**
 * Class OperatorToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperatorToken extends AbstractToken
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->operator($this);
    }
}