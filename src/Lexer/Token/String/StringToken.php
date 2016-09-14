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

namespace Vain\Expression\Lexer\Token\String;

use Vain\Expression\Lexer\Token\AbstractToken;
use Vain\Expression\Lexer\Token\Visitor\VisitorInterface;

/**
 * Class StringToken
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class StringToken extends AbstractToken
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->string($this);
    }
}